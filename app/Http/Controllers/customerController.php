<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function CreateCustomer(Request $request){
      $user_id=$request->header("id");
      return customer::create([
        "name"=> $request->input('name'),
        'email'=> $request->input('email'),
        'mobile'=> $request->input('mobile'),
        'user_id'=> $user_id
      ]);
    }
    public function UpdateCustomer(Request $request){
        $user_id=$request->header('id');
        $customer_id=$request->input('id');
        return customer::where('id', $customer_id)->where('user_id', $user_id)->update([
        'name'=> $request->input('name'),
        'email'=> $request->input('email'),
        'mobile'=> $request->input('mobile')
       ]);
    }
    public function DeleteCustomer(Request $request){
          $user_id=$request->header('id');
          $customer_id=$request->input('id');
          return customer::where('id',$customer_id)->where('user_id', $user_id)->delete();
    }
    public function CustomerList(Request $request){
       $user_id=$request->header('id');
       

       return customer::where('user_id',$user_id)->get();
    }
    public function CustomerById(Request $request){
       $user_id=$request->header('id');
       $customer_id=$request->input('id');
       return customer::where('user_id',$user_id)->where('id',$customer_id)->first();
    }


    public function CustomerPage(){
        return view('pages.dashboard.customer-page');
    }
}
