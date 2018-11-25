<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\products;
use App\orders;
use DB;
use Auth;
use App\Address;
use PDF;

class CheckoutController extends Controller
{
    public function index(){
//        $data = DB::table('orders')
//            ->join('users','users.id','orders.user_id')
//            ->get();

        return view('cart.checkout',[
            'data' => Cart::content()
        ]);
    }

//    public function printInvoice(){
//        $pdf = PDF::loadView('cart.placeOrder');
//        return $pdf->download('final_order.pdf');
//
//
//    }

    public function printInvoice(){
//return '1';
        Cart::destroy();
        $data = Address::get();
        $pdf = PDF::loadView('cart.placeOrder', $data);
        return $pdf->download('invoice.pdf');

    }


    public function placeOrder(Request $request){

        $this->validate($request, [
            'fullname' => 'required|min:5|max:35',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'city' => 'required|min:5|max:25',
            'state' => 'required|min:5|max:25',
            'country' => 'required',
            'fullAddress' => 'required'
        ]);
        $address = new Address;

        $address->userid = Auth::user()->id;
        $address->fullname = $request->fullname;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->country = $request->country;
        $address->fullAddress = $request->fullAddress;
        $address->save();
//        orders::createOrder();

        return view('cart.placeOrder',[
            'data' => Cart::content(), 'address' => $address
        ]);
    }

    public function checkCoupon(Request $res)
    {
        $code = $res->code;
        $check = DB::table('coupons')
            ->where('coupon_code',$code)
            ->get();
        if(count($check)=="1"){
            //ok
            $user_id = Auth::user()->id;
            $check_used = DB::table('used_coupons')
                ->where('user_id',$user_id)
                ->where('coupon_id',$check[0]->id)
                ->count();
            if($check_used=="0"){
                //insert used one
                $used_add = DB::table('used_coupons')
                    ->insert([
                        'coupon_id' => $check[0]->id,
                        'user_id' => $user_id
                    ]);
                $insert_cart_total = DB::table('cart_total')
                    ->insert([
                        'cart_total' => Cart::total(),
                        'discount' => $check[0]->discount,
                        'user_id' => $user_id,
                        'gtotal' =>  Cart::total() - (Cart::total() * $check[0]->discount)/100,
                    ]);
                $disnew = $check[0]->discount;
                $gtnew = Cart::total() - (Cart::total() * $check[0]->discount)/100;

                //echo "applied";
                ?>
                <div class="cart-total" >
                    <h4>Total Amount</h4>
                    <table>
                        <tbody>
                        <tr>
                            <td>Sub Total</td>
                            <td>RM <?php echo Cart::subtotal(); ?></td>
                        </tr>
                        <tr>
                            <td>Tax (%)</td>
                            <td>RM <?php echo Cart::tax(); ?></td>
                        </tr>
                        <tr>
                            <td>Grand Total </td>
                            <td>RM <?php echo Cart::total(); ?></td>
                        </tr>
                        <tr>
                            <td>Discount(%) </td>
                            <td> <?php echo $disnew; ?></td>
                        </tr>
                        <tr>
                            <td>Grand Total (After discount) </td>
                            <td>RM <?php echo $gtnew; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="<?php echo url('/') ?>" class="btn update btn-block" style="color: white; font-weight: bold">Continue Shopping</a>
                    <a href="<?php echo url('checkout') ?>" class="btn check_out btn-block" style="color: white; font-weight: bold">Checkout</a>
                </div>

                <?php
            }
            else{?>

                <div class="alert alert-danger">This Coupon Have Already Been Used</div>
                <div class="cart-total" >
                    <h4>Total Amount</h4>
                    <table>
                        <tbody>
                        <tr>
                            <td>Sub Total</td>
                            <td>RM <?php echo Cart::subtotal(); ?></td>
                        </tr>
                        <tr>
                            <td>Tax (%)</td>
                            <td>RM <?php echo  Cart::tax(); ?></td>
                        </tr>


                        <tr>
                            <td>Grand Total</td>
                            <td>RM <?php echo Cart::total(); ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="<?php echo url('/') ?>" class="btn update btn-block" style="color: white; font-weight: bold">Continue Shopping</a>
                    <a href="<?php echo url('checkout') ?>" class="btn check_out btn-block" style="color: white; font-weight: bold">Checkout</a>
                </div>
            <?php }
        }else if (!$code){
            //echo "wrong coupon";
            ?>
            <div class="alert alert-danger">Please Insert The Coupon Code</div>

            <div class="cart-total" >
                <h4>Total Amount</h4>
                <table>
                    <tbody>
                    <tr>
                        <td>Sub Total</td>
                        <td>RM <?php echo Cart::subtotal(); ?></td>
                    </tr>
                    <tr>
                        <td>Tax (%)</td>
                        <td>RM <?php echo  Cart::tax(); ?></td>
                    </tr>


                    <tr>
                        <td>Grand Total</td>
                        <td>RM <?php echo Cart::total(); ?></td>
                    </tr>
                    </tbody>
                </table>
                <a href="<?php echo url('/') ?>" class="btn update btn-block" style="color: white; font-weight: bold">Continue Shopping</a>
                <a href="<?php echo url('checkout') ?>" class="btn check_out btn-block" style="color: white; font-weight: bold">Checkout</a>
            </div>
        <?php }else{
            //echo "wrong coupon";
            ?>
            <div class="alert alert-danger">Wrong Coupon Code Entered</div>

            <div class="cart-total" >
                <h4>Total Amount</h4>
                <table>
                    <tbody>
                    <tr>
                        <td>Sub Total</td>
                        <td>RM <?php echo Cart::subtotal(); ?></td>
                    </tr>
                    <tr>
                        <td>Tax (%)</td>
                        <td>RM <?php echo  Cart::tax(); ?></td>
                    </tr>


                    <tr>
                        <td>Grand Total</td>
                        <td>RM <?php echo Cart::total(); ?></td>
                    </tr>
                    </tbody>
                </table>
                <a href="<?php echo url('/') ?>" class="btn update btn-block" style="color: white; font-weight: bold">Continue Shopping</a>
                <a href="<?php echo url('checkout') ?>" class="btn check_out btn-block" style="color: white; font-weight: bold">Checkout</a>
            </div>
        <?php }
    }

}
