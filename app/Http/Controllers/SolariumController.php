<?php

namespace App\Http\Controllers;

use Solarium\Client;
use Solarium\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SolariumController extends Controller {
	protected $client;
	public function __construct(Client $client) {
		$this->client = $client;
	}
	
	/**
	 * Pings the SOLR instance
	 */
	public function ping() {
		// create a ping query
		$ping = $this->client->createPing ();
		
		// execute the ping query
		try {
			$this->client->ping ( $ping );
			return response ()->json ( 'OK' );
		} catch ( Exception $e ) {
			return response ()->json ( 'ERROR', 500 );
		}
	}
	public function search(Request $request) {
		if ($request->getMethod () == Request::METHOD_POST) {
			$months = array('magh','falgoon','chaitra','baishakh','jaistha','ashar','srabon','vadro','ashyeen','karttik','agrohawan','poush','vadra','jaishtho');
			$input = $request->input();
			$searchMonth=array();
			if (array_key_exists('month',$input)){
				$searchMonth=$input['month'];
			}
			/* Log::debug($input);
			Log::debug($searchMonth); */
			$searchField=trim(str_replace('*','',$input['Search']));
			$pattern="/ /";			
			$searchWords=preg_split($pattern, $searchField);
			
			//echo 'Search Words:';
			//print_r($searchWords);
			
			$client = $this->client;
			$query = $client->createSelect();
			
			// print_r($query);
			$queryString=NULL;
			$yearsfq=array();
			//$monthsfq=array();
			$booknumbers=array();
			$fqString=NULL;
			$contructedQuery=NULL;
			foreach ($searchWords as $searchWord) {
				if (isset($queryString) and count(preg_grep('/'.$searchWord.'/',$months))<1){
					$queryString.=' ';//' and ';
				}
				if (!is_numeric($searchWord) and count(preg_grep('/'.$searchWord.'/',$months))<1){
					$queryString.=$searchWord;//'author_txt_en_split:*'.$searchWord.'* or subject_txt_en_split:*'.$searchWord.'*';
					// or bookmonth_txt_en_split:*'.$searchWord.'*';
				} /* else if (!is_numeric($searchWord) and count(preg_grep('/'.$searchWord.'/',$months))>0) {
					$monthsfq[]=$searchWord;
				} */ else if (is_numeric($searchWord) and $searchWord<25){
					$booknumbers[]=$searchWord;
				}else if (is_numeric($searchWord)) {
					$yearsfq[]=$searchWord;
				} 
				//$queryString.='bookyear_i:*'.$searchWord.'* or booknumber_i:*'.$searchWord.'*';				
			}
			if (count($yearsfq)>0){
				$i=1;
				foreach ($yearsfq as $year) {
					$fqString='bookyear_i:'.$year;
					$query->createFilterQuery('filterByYr'.$i)->setQuery($fqString);
					$i=$i+1;
				}
			}
			if (count($booknumbers)>0){
				$i=1;
				foreach ($booknumbers as $booknumber) {
					$fqString='booknumber_i:'.$booknumber;
					$query->createFilterQuery('filterByBooknum'.$i)->setQuery($fqString);
					$i=$i+1;
				}
			}
			if (count($searchMonth)>0){
				$i=1;
				$fqString=NULL;
				foreach ($searchMonth as $month) {
					if (isset($fqString) and $i<=count($searchMonth)){
						$fqString=$fqString.' or ';
					}
					//'bookmonth_txt_en_split:'
					$fqString=$fqString.$month;
					
					$i=$i+1;
				}
				$fqString='bookmonth_txt_en_split:('.$fqString.')';
				Log::debug($fqString);
				$query->createFilterQuery('filterByMonths')->setQuery($fqString);
			}
			if (!isset($queryString)){
				$queryString='*';	
			}
			$contructedQuery='author_txt_en_split:'.trim($queryString).' or subject_txt_en_split:'.trim($queryString);
			$query->setQuery($contructedQuery);
			//$query->createFilterQuery('filterByYrMonBooknum')->setQuery($fqString);
			//$query->addFilterQuery(array('key'=>'bookname', 'query'=>'*:*'));
			// $query->addFilterQuery(array('key'=>'degree', 'query'=>'degree:MBO', 'tag'=>'exclude'));
			$facets = $query->getFacetSet();
			$facets->createFacetField('bookname')->setField('bookname_ws');
			$facets->setMinCount(1);
			//$groupComp=$query->getGrouping();
			//$groupComp->addField('bookname_ws');			
			$query->setFields(array('bookname_ws','author_txt_en_split','bookyear_i','bookmonth_txt_en_split','subject_txt_en_split'));
			//echo 'Query:<br/>';
			//print_r($query);
			
			$resultset = $client->select( $query );
			//echo '<br/><br/> ResultSet:<br/>';
			//print_r($resultset);
			// display the total number of documents found by solr
			//echo 'NumFound: ' . $resultset->getNumFound ();
			//echo '<br/>';
			//echo 'Books:<br/>';
			//print_r($resultset->getFacetSet()->getFacets());
			//$groups = $resultset->getGrouping();
			// show documents using the resultset iterator
			/* foreach ( $resultset as $document ) {
				
				echo '<hr/><table>';
				
				// the documents are also iterable, to get all fields
				foreach ( $document as $field => $value ) {
					// this converts multivalue fields to a comma-separated string
					if (is_array ( $value )) {
						$value = implode ( ', ', $value );
					}					
					echo '<tr><th>' . $field . '</th><td>' . $value . '</td></tr>';
				}				
				echo '</table>';
			} */
			//$books=$resultset->getFacetSet()->getFacets()['bookname'];
			/* echo '<hr/><table>';
			foreach ($books as $bookname=>$count){
				echo '<tr><td>' . $bookname. '</td></tr>';
			}
			echo '</table>'; */
			/* foreach ($groups as $groupKey => $fieldGroup) {
				
				echo '<h1>'.$groupKey.'</h1>';
				echo 'Matches: '.$fieldGroup->getMatches().'<br/>';
				echo 'Number of groups: '.$fieldGroup->getNumberOfGroups();
				
				foreach ($fieldGroup as $valueGroup) {
					
					echo '<h2>'.(int)$valueGroup->getValue().'</h2>';
					
					foreach ($valueGroup as $document) {
						
						echo '<hr/><table>';
						
						// the documents are also iterable, to get all fields
						foreach ($document as $field => $value) {
							// this converts multivalue fields to a comma-separated string
							if (is_array($value)) {
								$value = implode(', ', $value);
							}
							
							echo '<tr><th>' . $field . '</th><td>' . $value . '</td></tr>';
						}
						
						echo '</table>';
					}
				}
			} */
			return view('search')->with(['results'=>$resultset])->with('query',$input['Search'])->with('months',$searchMonth);
		}
		if ($request->getMethod () == Request::METHOD_GET) {
			return view('search');
		}
	}
	public function index() {
	}
}
