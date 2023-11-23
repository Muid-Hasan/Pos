<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class reportController extends Controller
{
   
    function ReportPage(){
        return view('pages.dashboard.salereport-page');
    }

    function SalesReport(Request $request){
        $user_id=$request->header('id');
        $FormDate=date('Y-m-d',strtotime($request->FormDate));
        $ToDate=date('Y-m-d',strtotime($request->ToDate));

        $total=invoice::where('user_id',$user_id)->whereDate('created_at', '>=', $FormDate)->whereDate('created_at', '<=', $ToDate)->sum('total');
        $vat=invoice::where('user_id',$user_id)->whereDate('created_at', '>=', $FormDate)->whereDate('created_at', '<=', $ToDate)->sum('vat');
        $payable=invoice::where('user_id',$user_id)->whereDate('created_at', '>=', $FormDate)->whereDate('created_at', '<=', $ToDate)->sum('payable');
        $discount=invoice::where('user_id',$user_id)->whereDate('created_at', '>=', $FormDate)->whereDate('created_at', '<=', $ToDate)->sum('discount');
        $list=invoice::where('user_id',$user_id)->whereDate('created_at', '>=', $FormDate)->whereDate('created_at', '<=', $ToDate)->with('customer')->get();

        $data=['payable'=> $payable,'discount'=>$discount, 'total'=> $total, 'vat'=> $vat, 'list'=>$list,'FormDate'=>$request->FormDate,'ToDate'=>$request->FormDate];
        $pdf = Pdf::loadView('reports.SalesReport',$data);
        return $pdf->download('invoice.pdf');

    }
}
