<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function showPdf(Request $request){
    	$input=$request->input('data');
    	//echo $input;
    	$pdfName=explode('_',$input);
    	//print_r($pdfName);
    	return response()->json(array('bookname'=>$pdfName['1']));
    }
}
