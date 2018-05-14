<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Model\UdbBookDetail;
use App\Model\UserBook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	return response()->file('pdf/'.$id);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSwf($id)
    {
    	Log::info('swf/'.explode('.', $id)[0].'.swf');
    	return response()->with('bookName',url('swf/'.explode('.', $id)[0].'.swf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Download the file
     * @param string $name
     * @return \Illuminate\Http\Response
     * 
     */
    public function download($name){
    	return response()->download('pdf/'.$name);
    }
	
	public function downloadBook(Request $request){
		Log::info('Method '.$request->getMethod ());
		if ($request->getMethod () == Request::METHOD_POST){
			Log::info('Book Name '.$request->input('bookName'));
			Log::info('User Id '.Auth::user()->id);
			$userBook=UserBook::where('book_name','=',$request->input('bookName'))->where('user_id','=',Auth::user()->id)->first();
			Log::info('Book is already bought? '.$userBook);
			if (!isset($userBook)){
				$price=floatval(BuyBookController::getCommonConstantData('UDB_SUBSCRIPTION','PRICE_PER_BOOK'));
				Log::info("Payable=".$price);
				$gstRate=floatval(BuyBookController::getCommonConstantData('UDB_SUBSCRIPTION','GST_RATE'));
				Log::info("GST=".$gstRate);
				$intamojoRate=floatval(BuyBookController::getCommonConstantData('UDB_SUBSCRIPTION','PAYMENTGATEWAY_RATE'));
				Log::info("Transaction Charges Rate=".$intamojoRate);
				$intamojoConstant=floatval(BuyBookController::getCommonConstantData('UDB_SUBSCRIPTION','PAYMENTGATEWAY_CONSTANT'));
				$gstRate=1+$gstRate;
				$rateAfterPaymentGateway=$gstRate*$intamojoRate;
				$finalTax=$gstRate+$rateAfterPaymentGateway;
				$tax = $finalTax*$price+$intamojoConstant-$price;
				$actualPrice=$price+$tax;
				Log::info("Actual Price=".$actualPrice);
				$book=UdbBookDetail::where('book_name','=',$request->input('bookName'))->select('book_id','book_name')->first();
				return view('buybooks')->with(array('price'=>$price,'tax'=>$tax,'total'=>$actualPrice,'groupid'=>null,'bookid'=>$book['book_id']));
			}else{
				return Storage::disk('public')->download('pdf/'.$request->input('bookName'));
			}
		}
	}
}
