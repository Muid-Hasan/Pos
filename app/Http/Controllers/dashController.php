<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\invoice;
use App\Models\product;
use App\Models\category;
use App\Models\customer;
use Illuminate\Http\Request;

class dashController extends Controller
{

    function Summary(Request $request):array{
        $user_id=$request->header('id');
        $product= product::where('user_id',$user_id)->count();
        $Category= category::where('user_id',$user_id)->count();
        $Customer=customer::where('user_id',$user_id)->count();
        $Invoice= invoice::where('user_id',$user_id)->count();
        $total=  invoice::where('user_id',$user_id)->sum('total');
        $vat= invoice::where('user_id',$user_id)->sum('vat');
        $payable =invoice::where('user_id',$user_id)->sum('payable');

        return[
            'product'=> $product,
            'category'=> $Category,
            'customer'=> $Customer,
            'invoice'=> $Invoice,
            'total'=> round($total,2),
            'vat'=> round($vat,2),
            'payable'=> round($payable,2)
        ];


    }
    function Userprofile(Request $request){
        $email=$request->header('email');
        $user=user::where('email',$email)->first();
        return response()->json([
            'status'=> 'success',
            'message'=> 'Request Successfull',
            'data'=>$user
        ],200);
    }

    function Updateprofile(Request $request){
        try{
            $email=$request->header('email');
            $firstName=$request->input('firstName');
            $lastName=$request->input('lastName');
            $companyName=$request->input('companyName');
            $address=$request->input('address');
            $mobile=$request->input('mobile');
            $password=$request->input('password');
    
            $user=user::where('email',$email)->update([
                'firstName'=>$firstName,
                'lastName'=>$lastName,
                'companyName'=>$companyName,
                'address'=>$address,
                'mobile'=>$mobile,
                'password'=>$password
            ]);
            return response()->json([
                'status'=> 'success',   
                'message'=> 'Request Successful',
                
            ],200);
        }
        
        catch(\Exception $e){
              return response()->json([
                'status'=> 'error'
              ]) ;

        }
    }
       


    function LogoutUser(){
        return redirect("/Login")->cookie('token','',-1);
    }

    function profilePage(){
        return view('pages.dashboard.profile-page');
       }
    function dashsumPage(){
        return view('pages.dashboard.dashhome-page');
       }
}
