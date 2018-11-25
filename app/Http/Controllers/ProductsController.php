<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductsController extends Controller
{


    public function proCat(Request $request){
        $cat = $request->cat;
//        $data = DB::table('cats')
//            ->join('products', 'products.cat_id', '=', 'cats.id')
//            ->select('cats.cat_name', 'cats.p_id', 'products.*')
//            ->where('cats.cat_name', '=', $cat)
//            ->get();
         $data = DB::table('products')
            ->join('cats','cats.id','products.cat_id')
             ->select('cats.cat_name', 'products.*')
            ->where('cats.cat_name', '=', $cat)
            ->get();
        return view('front.products',[
            'data' => $data , 'catByUser' => $cat
        ]);

    }


    public function productsCat(Request $request){
       $cat_id = $request->cat_id;
    //       return $request->cat_id;
    //       $priceCount = count($request->price);
        $priceCount = count((array)$request->price);
           // price are array
           if($cat_id!="" && $priceCount!="0"){
             $price = explode("-",$request->price);
              $start = $price[0];
              $end = $price[1];
              //echo "both are selected";
              $data = DB::table('products')
              ->join('cats','cats.id','products.cat_id')
              ->where('products.cat_id',$cat_id)
              ->where('products.pro_price', ">=", $start)
              ->where('products.pro_price', "<=", $end)
              ->get();
           }
           else if($priceCount!="0"){
             $price = explode("-",$request->price);
             $start = $price[0];
             $end = $price[1];
             //echo "price is selected";
             $data = DB::table('products')
             ->join('cats','cats.id','products.cat_id')
             ->where('products.pro_price', ">=", $start)
             ->where('products.pro_price', "<=", $end)
             ->get();
           }
           else if($cat_id!=""){
             //echo "cat is selected";
             $data = DB::table('products')
             ->join('cats','cats.id','products.cat_id')
             ->where('products.cat_id',$cat_id)
             ->get();
           }
           else{
             //echo "nothing is selected";
             return "<h1 align='center'>Please select at least one filter from drop down list</h1>";
           }
           if(count($data)=="0"){
             echo "<h1 align='center'>no products found under this Category</h1>";
           }else{
           return view('front.productsPage',[
             'data' => $data, 'catByUser' => $data[0]->cat_name
           ]);
        }
    }


    public function search(Request $request){
      $searchData= $request->searchData;

      //start query for search
      $data = DB::table('products')
      ->join('cats','cats.id','products.cat_id')
      ->where('products.pro_name', 'like', '%' . $searchData . '%')
      ->get();
      return view('front.products',[
        'data' => $data, 'catByUser' => $searchData
      ]);
    }




}
