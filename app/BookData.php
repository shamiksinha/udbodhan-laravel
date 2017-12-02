<?php
namespace App;
use Illuminate\Pagination\LengthAwarePaginator;
use App\BookDetails;

class BookData extends LengthAwarePaginator {
	
	
	private $_bookDetails;
	private $_bookData;
	
	public function __construct(){
		if (is_null($this->_bookData)){
			$this->_bookData=array();
		}
	}
	
	public function getBookData() {
		return $this->_bookData;
	}
	
	public function addBookDetails($author,$subject){
		$this->_bookDetails=new BookDetails($author, $subject);
		$this->_bookData[]=$this->_bookDetails;
		return $this->_bookData;
	}
	
}