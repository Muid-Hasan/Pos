<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\user;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    public function userRegistration(Request $request)
    {
          try{
                user::create([
                "firstName" => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'companyName' => $request->input('companyName'),
                'address' => $request->input('address'),
                'mobile' => $request->input('mobile'),
                'email' => $request->input('email'),
                'password' => $request->input('password')]);
                 
               return response()->json([
                'status'=>'Success',
                'message'=> 'Registration Successfull!'
               ],200) ;
            }
            catch(Exception $e){
                return response()->json([
                    'status'=> 'Failed',
                    'message'=> 'Registration Unsuccessfull!'
                ],401);
            }

    }

    public function userLogin(Request $request)
    {

        try{
        $email = $request->input('email');
        $password = $request->input('password');

        $count = user::where('email', $email)->where('password', $password)->select('id')->first();

        if($count!==null){
            $token=JWTToken::generateToken($email,$count->id);
            return response()->json([
                'token'=> $token
            ],200)->cookie('token', $token,60*60*6);
        } 
        else{
             return response()->json([
                'message'=> 'Login Failed!'
             ],401);
        }

     }
        
        catch(Exception $e){

               return response()->json([
                'status'=>"Something Wrong In Authentication Process!!",
                'message'=> $e->getMessage()
               ]);
        }
    }

    public function sendOtp(Request $request)
    {
        $email = $request->input('email');
        $otp = rand(1000, 9999);

        $count = user::where('email', '=', $email)->count();
        if ($count === 1) {
            Mail::to($email)->send(new OTPMail($otp));
            user::where('email', '=', $email)->update(['otp' => $otp]);
            $request->headers->set('email', $email);

            return response()->json([
                'Status' => 'Success',
                'Message' => 'Four Digit Otp has been send to your Email address',
                
            ], 200);
        } else {

            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Something Wrong during Sending Otp'
            ], 401);
        }
    }
    public function verifyOtp(Request $request)
    {
       $email = $request->input('email');
       $otp = $request->input('otp');
       $count = user::where('email', '=', $email)->where('otp','=', $otp)->count();
       if ($count === 1) { 

        user::where('email', '=', $email)->update(['otp'=>0]);  
        $token=JWTToken::generateTokenforPassword($email);
        return response()->json([
             'status'=> 'success',
             'message'=> 'OTP varified Successfully!'
             ],200)->cookie('token', $token,60*3);
       }
       else{
        return response()->json([
            'status'=> 'error',
            'message'=> 'Something Wrong During Varified OTP'
        ]);
       }
    }
    public function resetPassword(Request $request){
        try{
            $email = $request->header('email');
            $password = $request->input('password');
            user::where('email', '=', $email)->update([
             'password'=> $password
            ],200);

            return response()->json([
                'status'=> 'success',   
                'message'=> 'Password Reset Successfully!'
            ],200)->cookie('token','',-1);
        }
        catch(Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> $e->getMessage()
            ]);    

        }
      
    }

    function homePage(){
        return view('pages.auth.home-page');
       }
    
    function loginPage(){
        return view('pages.auth.login-page');
       }
    function registrationPage(){
        return view('pages.auth.registration-page');
    }
    function sendotpPage(){
        return view('pages.auth.sendotp-page');
    }
    function verifyotpPage(){
        return view('pages.auth.verifyotp-page');
    }
    function resetpasswordPage(){
        return view('pages.auth.resetpassword-page');
    }
}
    