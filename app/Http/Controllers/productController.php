<?php

namespace App\Http\Controllers;

use App\Models\product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class productController extends Controller
{
    public function ProductCreate(Request $request){
     $user_id= $request->header("id");
     $category_id= $request->input("category_id");

     $img= $request->file("img");

     $t=time();
     $file_name=$img->getClientOriginalName();
     $img_name="{$user_id}-{$t}-{$file_name}";
     $img_url="uploads/$img_name";

     $img->move(public_path("uploads"), $img_name);

     return product::create([
       "user_id"=> $user_id,
       "category_id"=> $category_id,
       "img_url"=>$img_url,
       "name"=>$request->input("name"),
       "price"=>$request->input("price"),
       "unit"=>$request->input("unit"),
     ]);
    }
    public function ProductUpdate(Request $request){
      $user_id= $request->header('id');
      $product_id= $request->input('id');

      if($request->hasFile('img')){
        $img= $request->file('img');
        $t=time();
        $file_name=$img->getClientOriginalName();
        $img_name= "{$user_id}-{$t}-{$file_name}";
        $img_url= "uploads/{$img_name}";
        $img->move(public_path('uploads'), $img_name);


        $filePath=$request->input('file_path');
        File::delete($filePath);

        return product::where('user_id',$user_id)->where('id',$product_id)->update([
           
            'category_id'=> $request->input('category_id'),
            'name'=> $request->input('name'),
            'price'=>$request->input('price'),
            'unit'=>$request->input('unit'),
            'img_url'=>$img_url,

        ]);
      }
      else{
        return product::where('id',$product_id)->where('user_id', $user_id)->update([
            'category_id'=> $request->input('category_id'),
            'name'=> $request->input('name'),
            'price'=>$request->input('price'),
            'unit'=>$request->input('unit'),
        ]);
      }
    }
    public function ProductDelete(Request $request){
      $user_id= $request->header("id");
      $product_id= $request->input("id");
      $filePath= $request->input("file_path");
      File::delete($filePath);
      return product::where("user_id", $user_id)->where('id', $product_id)->delete();
    }
    public function ProductList(Request $request){
      $user_id= $request->header('id');
      return Product::where('user_id', $user_id)->get();
    }
    public function ProductById(Request $request){
        $user_id= $request->header('id');
        $product_id= $request->input('id');
        return product::where('user_id', $user_id)->where('id', $product_id)->first();
    }
    






    function ProductPage(){
        return view("pages.dashboard.product-page");
    }
}
