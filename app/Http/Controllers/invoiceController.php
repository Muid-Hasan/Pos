<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\invoice;
use App\Models\product;
use App\Models\customer;
use Illuminate\View\View;
use Illuminate\Http\Request;

use App\Models\InvoiceProduct;
use Illuminate\Support\Facades\DB;

class invoiceController extends Controller
{
    function invoiceCreate(Request $request){
        DB::beginTransaction();
        try{
            $user_id = $request->header('id');
            $total=$request->input('total');
            $discount=$request->input('discount');
            $vat=$request->input('vat');
            $payable=$request->input('payable');
            $customer_id = $request->input('customer_id');

            $invoice=invoice::create([
                "user_id"=> $user_id,
                "total"=> $total,
                "discount"=> $discount,
                "vat"=> $vat,
                "payable"=> $payable,
                "customer_id"=> $customer_id
            ]);

            $invoiceID = $invoice->id;
            $products= $request->input("products");

            foreach($products as $product){
                InvoiceProduct::create([
                    'invoice_id'=>$invoiceID,
                    'user_id'=> $user_id,
                    'product_id'=> $product['product_id'],
                    'qty'=> $product['qty'],
                    'sale_price'=> $product['sale_price']
                ]);
            }
            DB::commit();
            return 1;
        }
        catch(Exception $e){
          DB::rollBack();
          return $e->getMessage();
        }
    }

    function invoiceSelect(Request $request){
        $user_id = $request->header('id');
        return invoice::where('user_id', $user_id)->with('customer')->get();
    }

    function invoiceDetails(Request $request){
        $user_id = $request->header('id');
        $customerDetails= customer::where('user_id', $user_id)->where('id',$request->input('customer_id'))->first();
        $invoiceTotal=invoice::where('user_id', $user_id)->where('id',$request->input('invoice_id'))->first();

        $invoiceProduct = InvoiceProduct::where('invoice_id', $request->input('invoice_id'))
        ->where('user_id', $user_id)
        ->with('product') // Assuming 'product' is the relationship name in InvoiceProduct model
        ->get();
    

        return array(
        'invoice'=> $invoiceTotal,
        'product'=> $invoiceProduct,
        'customer'=> $customerDetails
        );
    }
    function invoiceDelete(Request $request){
        DB::beginTransaction();
        try{
        $user_id = $request->header('id');
        InvoiceProduct::where('invoice_id',$request->input('invoice_id'))
                        ->where('user_id',$user_id)->delete();
        invoice::where('id', $request->input('invoice_id'))->delete();
        DB::commit();
        return 1;
        }
        catch(Exception $e){
            DB::rollBack();
            return 0;
        }
    }

    function InvoicePage():View{
        return view('pages.dashboard.invoice-page');
    }

    function SalePage():View{
        return view('pages.dashboard.sale-page');
    }
}
