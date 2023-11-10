<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class dashController extends Controller
{
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
