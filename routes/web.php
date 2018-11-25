<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Index Route
Route::view('/','front.index',
    ['data'=> App\products::all(),'catByUser' => 'All Products']);
//End of Index Route

//Products Route
Route::view('products','front.products',
    ['data'=> App\products::all(),'catByUser' => 'All Products']);
Route::get('products/{cat}','ProductsController@proCat');
Route::get('search','ProductsController@search');
Route::get('productsCat','ProductsController@productsCat');
Route::get('productsDetails/{id}', function($id){
    return view('front.productsDetails',[
        'data' => App\products::where('pro_name',$id)->get()
    ]);
});
//End of Products Route



Auth::routes();
//user middleware
Route::group(['middleware' => 'auth'],  function () {

    //Check Out Route
    Route::get('checkout', 'CheckoutController@index');
    //End of Check Out Route

    //Place Order Route
    Route::post('placeOrder', 'CheckoutController@placeOrder');
    //End of Place Order Route

    //Order Details Route
    Route::get('printInvoice/','CheckoutController@printInvoice');
    //End of Order Details Route

    //Thank You Route
//    Route::get('order_confirm',function(){
//        return view('order_confirm');
//    });
//    Route::view('order_confirm','cart.order_confirm',
//        ['data' => Cart::content()]);
    //End of Thank You Route

    //Home Page Route
    Route::get('/logout', 'Auth\LoginController@getLogout');
    Route::get('/home', 'HomeController@index');
    Route::get('dashboard','HomeController@index');
    //End of Home Page Route

    //My account Route
    Route::view('myaccount', 'myaccount.index');
    Route::get('myaccount/{link}',function($link){
        return view('myaccount.index', ['link' => $link]);
    });
    //Enf of My account Route

    //Inbox Route
    Route::view('inbox', 'myaccount.inbox', [
        'data' => App\inbox::all()
    ]);
    Route::get('updateInbox', 'profileController@updateInbox');
    //End of Inbox Route

    //Cart Route
    Route::get('cart', 'cartController@index');
    Route::get('cart/add/{id}', 'cartController@addItem');
    Route::get('cart/remove/{id}', 'cartController@removeItem');
    Route::get('cart/update/','cartController@update');
    //End of Cart Route

    //Coupon Route
    Route::get('checkCoupon','checkoutController@checkCoupon');
    //End of Coupon Route

});





//Admin Middleware Start
Route::group(['prefix' => 'admin', 'middleware'=> ['auth']], function () {
    Route::get('/','AdminController@index');

    //Profile Route
    Route::view('profile', 'admin.profile', [
        'data' => App\user::all()
    ]);
    //End of Profile Route

    //Admin Product Route
    Route::get('/addProduct','AdminController@addProduct');
    Route::post('saveProduct', 'AdminController@saveProduct');
    Route::view('products', 'admin.products', [
        'data' => App\products::with('cats')->get()
    ]);
    Route::get('editProduct/{id}', function($id){
        return view('admin.editProduct',[
            'data' => App\products::where('id',$id)->get()
        ]);
    });
    //End of Admin Product Route

    //Admin Image Route
    Route::view('/changeImage/{id}','admin.changeImage');
    Route::post('/uploadPP','AdminController@uploadPP');
    //End of Admin Product Route

    //Admin Category Route
    Route::view('cats','admin.cats',[
        'data' => App\cats::all()
    ]);
    Route::view('addCategory','admin.addCategory');
    Route::get('editCategory/{id}', function($id){
        return view('admin.editCategory',[
            'data' => App\cats::where('id',$id)->get()
        ]);
    });
    Route::post('saveCategory','AdminController@saveCategory');
    Route::delete('removeCategory/{id}','AdminController@removeCategory');
    //End of Admin Category Route


    //Admin User Route
    Route::get('banUser', 'AdminController@banUser');
    //End of Admin User Route
});
