@extends('front.master')
@section('content')
    <script>
        $(document).ready(function(){
            $("#CartMsg").hide();
            @foreach($data as $pro)
            $("#upCart{{$pro->id}}").on('change keyup', function(){
                var newQty = $("#upCart{{$pro->id}}").val();
                var rowID = $("#rowID{{$pro->id}}").val();
                $.ajax({
                    url:'{{url('/cart/update')}}',
                    data:'rowID=' + rowID + '&newQty=' + newQty,
                    type:'get',
                    success:function(response){
                        // $("#CartMsg").show();
                        console.log(response);
                        $("#CartMsg").html(response);
                        $('.alert-info').fadeIn().delay(3000).fadeOut();
                        window.setTimeout(function(){location.reload()},5000)
                    }
                });
            });
            @endforeach
            $('#coupon_btn').click(function(){
                var coupon_id = $('#coupon_id').val();
                //alert(coupon_id);
                $.ajax({
                    url:'{{url('/checkCoupon')}}',
                    data: 'code=' + coupon_id,
                    success:function(res){
                        // alert(res);
                        $('#cartTotal').html(res);
                    }
                })
            });

        });
    </script>

    <div class="greyBg">
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{url('/')}}">Home </a></li>
                                <li><span class="dot">/</span>
                                    <a href="">Billing & Shipping</a>
                            </ul>
                        </div>
                    </div>
                </div>
            @if(Cart::count()!="0")
                <!-- design of cart page -->
                    <div class="row top20 hidden-xs">
                        <div class="col-sm-4">
                            <div class="wht-box">
                                <div class="wht-boxHd">Shopping Cart</div>
                                <div class="bwhtlk-boxTxt hidden-sm">Do you want to look on order?</div>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="blk-box">
                                <div class="blk-boxHd">Billing &amp; Shipping</div>
                                <div class="blk-boxTxt hidden-sm">Where should we send this order?</div>
                                <div class="arrow-down1"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="wht-box">
                                <div class="wht-boxHd">Confirmation</div>
                                <div class="wht-boxTxt hidden-sm">Confirm your order</div>
                            </div>
                        </div>
                    </div>
            </div>
            <br><hr>

            <div class="row ">
                <form action="{{url('/placeOrder')}}" method="post">
                    <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                    <h3 class="text-center">Fill billing address </h3>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text"  class="form-control" placeholder="Full Name" name="fullname">
                                <span style="color:red">{{ $errors->first('fullname') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email"  class="form-control" placeholder="Email" name="email">
                                <span style="color:red">{{ $errors->first('email') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text"  class="form-control" placeholder="Phone number" name="phone">
                                <span style="color:red">{{ $errors->first('phone') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="city">City Name</label>
                                <input type="text"  class="form-control" placeholder="City name" name="city">
                                <span style="color:red">{{ $errors->first('city') }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text"  class="form-control" placeholder="State" name="state">
                                <span style="color:red">{{ $errors->first('state') }}</span>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label for="country">Country</label>--}}
                                {{--<input type="text"  class="form-control" placeholder="Country" name="country">--}}
                                {{--<span style="color:red">{{ $errors->first('country') }}</span>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text"  class="form-control" placeholder="Country" name="country">
                                <span style="color:red">{{ $errors->first('country') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="fullAddress">Full Address</label>
                                <textarea class="form-control" rows="5" placeholder="Full Address"
                                       name="fullAddress"></textarea>
                                <span style="color:red">{{ $errors->first('fullAddress') }}</span>
                            </div>
                            <input type="submit"
                                   class="btn check_out btn-block" style="color: white;font-weight: bold;"
                                   value="Place order"/>
                        </div>
                    </div>

            </div>
            <br> <hr>
            {{--<div class="row">--}}
                {{--<div class="cart">--}}
                    {{--<div class="col-sm-12">--}}
                        {{--<div class="row">--}}
                            {{--<h3 class="text-center">Shopping Basket</h3>--}}
                            {{--<div class="col-md-4">Item(s)</div>--}}
                            {{--<div class="col-md-2">Quantity</div>--}}
                            {{--<div class="col-md-1">Unit Price</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-8">--}}
                                {{--@if(isset($msg))--}}
                                    {{--<div class="alert alert-info">{{$msg}}</div>--}}
                                {{--@endif--}}
                                {{--<div class="alert alert-info" id="CartMsg"></div>--}}

                                {{--Add Cart Message--}}
                                {{--@if (session('status'))--}}
                                {{--<div class="alert alert-info">--}}
                                {{--{{ session('status') }}--}}
                                {{--</div>--}}
                                {{--@endif--}}
                                {{--End of Add Cart Message--}}

                                {{--@foreach($data as $pro)--}}

                                    {{--<div class="cart-row">--}}
                                        {{--<div class="row">--}}

                                            {{--<div class="col-xs-12 col-sm-6 col-md-6 text-center">--}}
                                                {{--<img src="{{asset('img')}}/{{$pro->options->img}}"--}}
                                                     {{--class="img-responsive pull-left" width="100px" />--}}
                                                {{--<span class="pull-left top20">--}}
                                      {{--<a href="{{url('productsDetails')}}/{{$pro->name}}">--}}
                                          {{--<b>{{ucwords($pro->name)}}</b>--}}
                                        {{--</a>--}}
                                      {{--</span>--}}

                                            {{--</div>--}}
                                            {{--<div class="col-xs-12 col-sm-3 col-md-3">--}}
                                                {{--<input type="hidden" value="{{$pro->rowId}}"--}}
                                                       {{--id="rowID{{$pro->id}}"/>--}}
                                                {{--<div class="cart-qty">--}}
                                                    {{--<input type="number" max="10" min="1"--}}
                                                           {{--value="{{$pro->qty}}" class="qty-fill"--}}
                                                           {{--id="upCart{{$pro->id}}" readonly>--}}
                                                {{--</div>--}}
                                                {{--<a class="cart-remove btn btn-success" >Update</a>--}}

                                                {{--<a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('city-delete', $result->my_id)}}"><i class="fa fa-trash"></i></a>--}}


                                                {{--<a href="{{url('cart/remove')}}/{{$pro->rowId}}" onclick="return confirm('Are you sure?')"--}}
                                                   {{--class="cart-remove btn btn-cart_danger" style="color: white;font-weight: bold;">Remove</a>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-xs-12 col-sm-3 col-md-3">--}}
                                                {{--<p>RM{{$pro->price}}</p>--}}
                                                {{--<hr/>--}}
                                                {{--<h6 class="redtext">--}}
                                                {{--Sub Total: {{$pro->subtotal}}--}}
                                                {{--<br>--}}
                                                {{--Total(included Tax): {{$pro->total}}--}}
                                                {{--</h6>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-4" id="cartTotal">--}}
                                {{--<div class="cart-total">--}}
                                    {{--<h4>Total Amount</h4>--}}
                                    {{--<table>--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>Sub Total</td>--}}
                                            {{--<td>RM {{Cart::subtotal()}}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>Tax (10%)</td>--}}
                                            {{--<td>RM {{Cart::tax()}}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>Grand Total</td>--}}
                                            {{--<td>RM {{Cart::total()}}</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                    {{--<a href="{{url('/')}}"--}}
                                       {{--class="btn check_out btn-block" style="color: white;font-weight: bold;">Continue Shopping</a>--}}
                                    {{--<input type="submit" class="btn update btn-block" value="Continue Shopping">--}}
                                    {{--<a href="{{url('checkout')}}"--}}
                                       {{--class="btn check_out btn-block" style="color: white;font-weight: bold;">checkout</a>--}}
                                    {{--<input type="submit"--}}
                                           {{--class="btn check_out btn-block" style="color: white;font-weight: bold;"--}}
                                           {{--value="Place order"/>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            @else
                <div class="row">
                    <div class="col-md-2 col-md-offset-5 top25">
                        <img src="{{asset('theme/images')}}/shoppingcart.jpg"
                             class="img-response"/>
                        <br><br>
                        <p style="text-align:center"><b>Your Cart Is Empty</b><br><br>
                            <a href="{{url('/')}}"
                               class="btn check_out btn-block" style="color: white;font-weight: bold;">Continue Shopping</a>
                        </p>
                    </div>
                </div>
            @endif

                </form>
                <!-- design of cart page  end -->
        </div>
    </div>
@endsection