<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\products;
use App\orders;
use Helper;
class CartController extends Controller
{
    //


    public function index(){
      $cart = Cart::content();
      return view('cart.index', [
        'data' => $cart
     ]);
    }

    public function checkout(){
        orders::createOrder();

//        return view('cart.checkout',[
//            'data' => Cart::content()
//        ]);
//      return orders::createOrder();
//      return back();
    }

    public function addItem($id){
//        return products::find($id);
      $pro = products::find($id);
      Cart::add(['id' => $pro->id, 'name' => $pro->pro_name,
      'qty' => 1, 'price' => $pro->pro_price,
    'options' =>[
      'img' => $pro->pro_img
      ]]);
        //echo "add to cart successfully";
        //Return the user back to the page they came from with a message
        return back()->with('status', $pro->pro_name . ' add to cart successfully');

    }

    public function update(Request $request){
      $qty = $request->newQty;
      $rowId = $request->rowID;
      // update cart
      Cart::update($rowId,$qty);
      echo "Cart updated successfully!";

    }

    public function removeItem($id){
      Cart::remove($id);
      return back();
    }


}
