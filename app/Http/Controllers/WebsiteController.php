<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;

class WebsiteController extends Controller
{
    public function index(){
		$rows = array(
			['0'],
			['0', 'C/U', '0'],
			['0'],
			['0', '', '', '']
		);

		$sku = '';
		$quantity = '';
		$usercode = '';

        if(session('quantity')){
        	$quantity = session('quantity');
        }
		$user = false;
        if(session('usercode')){
        	$usercode = session('usercode');
            $user = User::where('code', '=', $usercode)->first();
        }
		$product = false;
        if(session('sku')){
        	$sku = session('sku');
            $product = Product::where('sku', '=', $sku)->first();

            if($product){
				$rows = array(
					[$product->description],
					[$product->sku, $product->unitmed, $product->department.$product->section],
					[$product->barcode],
					[$quantity, '', '', '']
				);
            }
        }

	    return view('paper_size_a4', compact(
	    	'rows',
	    	'sku',
	    	'quantity',
	    	'usercode',
	    	'user',
	    	'product'
	    ));
    }

    public function getDetailProduct(Request $request){
		$sku = $request->post('sku');
		$quantity = $request->input('quantity');
		$usercode = $request->input('usercode');

		return redirect()->route('main')->with(['sku' => $sku, 'quantity' => $quantity, 'usercode' => $usercode]);
    }

    public function getDetailPDF(Request $request){

		$rows = array(
			['0'],
			['0', 'C/U', '0'],
			['0'],
			['0', '', '', '']
		);

		$sku = $request->get('sku')?$request->get('sku'):'';
		$quantity = $request->get('quantity')?$request->get('quantity'):'';
		$usercode = $request->get('usercode')?$request->get('usercode'):'';

		$user = false;
        if($usercode != ''){
            $user = User::where('code', '=', $usercode)->first();
        }
		$product = false;
        if($sku != ''){
            $product = Product::where('sku', '=', $sku)->first();

            if($product){
				$rows = array(
					[$product->description],
					[$product->sku, $product->unitmed, $product->department.$product->section],
					[$product->barcode],
					[$quantity, '', '', '']
				);
            }
        }

	    $pdf = PDF::loadView('pdf', [
	    			'rows' 		=> $rows,
	    			'sku' 		=> $sku,
	    			'quantity' 	=> $quantity,
	    			'usercode' 	=> $usercode,
	    			'user' 		=> $user,
	    			'product'	=> $product
	    		])->setPaper('a4', 'landscape');
	    $filename = 'file_'.date('YmdHis').'.pdf';
	    return $pdf->download($filename);
    }
}
