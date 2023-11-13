<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{

    function CategoryList(Request $request){
        $user_id=$request->header("id");
        return category::where("user_id",$user_id)->get();
    }

    function CategoryCreate(Request $request){
        $user_id= $request->header("id");

        return category::create([
            'name'=>$request->input('name'),
            'user_id'=> $user_id,
        ]);    
    }

    function CategoryUpdate(Request $request){
        $user_id= $request->header('id');
        $category_id= $request->input('id');

        return category::where('user_id',$user_id)->where('id', $category_id)->update([
            'name'=>$request->input('name')

        ]);
    }
    function CategoryDelete(Request $request){
        $user_id= $request->header('id');
        $category_id= $request->input('id');
        return category::where('user_id',$user_id)->where('id',$category_id)->delete();
    }
    function CategoryById(Request $request){
        $user_id= $request->header('id');
        $category_id= $request->input('id');
        return category::where('user_id',$user_id)->where('id',$category_id)->first();
    }
    function CategoryPage(){
        return view("pages.dashboard.category-page");
    }
}
