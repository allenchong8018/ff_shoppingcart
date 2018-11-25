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

        function PrintDiv() {
            var divToPrint = document.getElementById('divToPrint');
            var popupWin = window.open('', '_blank', 'width=300,height=300');
            popupWin.document.open();
            popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
        }

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
                <div class="row top20 hidden-xs">
                    <div class="col-sm-4">
                        <div class="wht-box">
                            <div class="wht-boxHd">Shopping Cart</div>
                            <div class="bwhtlk-boxTxt hidden-sm">Do you want to look on order?</div>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="wht-box">
                            <div class="wht-boxHd">Billing &amp; Shipping</div>
                            <div class="wht-boxTxt hidden-sm">Where should we send this order?</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="blk-box">
                            <div class="blk-boxHd">Confirmation</div>
                            <div class="blk-boxTxt hidden-sm">Confirm your order</div>
                            <div class="arrow-down1"></div>
                        </div>
                    </div>
                </div>


                <div class="row ">
                    <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                    <h3 class="text-center">Order Details</h3>
                    <div class="form-group">
                        <div class="col-md-6">

                            <div class="form-group">
                                {!!Form::label('fullname', 'Full Name')!!}
                                {!!Form::text('fullname', null, ['class' => 'form-control', 'readonly' => 'true'])!!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('email', 'E-Mail Address')!!}
                                {!!Form::text('email', null, ['class' => 'form-control', 'readonly' => 'true'])!!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('phone', 'Phone Number')!!}
                                {!!Form::text('phone', null, ['class' => 'form-control', 'readonly' => 'true'])!!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('city', 'City Name')!!}
                                {!!Form::text('city', null, ['class' => 'form-control', 'readonly' => 'true'])!!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('state', 'State')!!}
                                {!!Form::text('state', null, ['class' => 'form-control', 'readonly' => 'true'])!!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('country', 'Country')!!}
                                {!!Form::text('country', null, ['class' => 'form-control', 'readonly' => 'true'])!!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('fullAddress', 'Full Address')!!}
                                {!!Form::text('fullAddress', null, ['class' => 'form-control', 'readonly' => 'true'])!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="cart">
                        <div class="col-sm-12">
                            <div class="row">
                                <h3 class="text-center">Shopping Basket</h3>
                                <div class="col-md-4">Item(s)</div>
                                <div class="col-md-2">Quantity</div>
                                <div class="col-md-1">Unit Price</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    @if(isset($msg))
                                        <div class="alert alert-info">{{$msg}}</div>
                                    @endif
                                    <div class="alert alert-info" id="CartMsg"></div>

                                    {{--Add Cart Message--}}
                                    @if (session('status'))
                                    <div class="alert alert-info">
                                    {{ session('status') }}
                                    </div>
                                    @endif
                                    {{--End of Add Cart Message--}}

                                    @foreach($data as $pro)

                                        <div class="cart-row">
                                            <div class="row">

                                                <div class="col-xs-12 col-sm-6 col-md-6 text-center">
                                                    <img src="{{asset('img')}}/{{$pro->options->img}}"
                                                         class="img-responsive pull-left" width="100px" />
                                                    <span class="pull-left top20">
                                      <a href="{{url('productsDetails')}}/{{$pro->name}}">
                                          <b>{{ucwords($pro->name)}}</b>
                                        </a>
                                      </span>

                                                </div>
                                                <div class="col-xs-12 col-sm-3 col-md-3">
                                                    <input type="hidden" value="{{$pro->rowId}}"
                                                           id="rowID{{$pro->id}}"/>
                                                    <div class="cart-qty">
                                                        <input type="number" max="10" min="1"
                                                               value="{{$pro->qty}}" class="qty-fill"
                                                               id="upCart{{$pro->id}}" readonly>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-3 col-md-3">
                                                    <p>RM{{$pro->price}}</p>
                                                    <hr/>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-sm-4" id="cartTotal">
                                    <div class="cart-total">
                                        <h4>Total Amount</h4>
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>RM {{Cart::subtotal()}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tax (10%)</td>
                                                <td>RM {{Cart::tax()}}</td>
                                            </tr>
                                            <tr>
                                                <td>Grand Total</td>
                                                <td>RM {{Cart::total()}}</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <a class="print" href="{{url("/printInvoice")}}" >
                                            <input type="submit"
                                                   class="btn check_out btn-block" style="color: white;font-weight: bold;"
                                                   value="Print Invoice" onclick="PrintDiv();"/>
                                        </a>

                                        <div id="divToPrint" style="display:none;">
                                            <div style="width:500px;height:500px;background-color:teal;">
                                                <div class="row ">
                                                    <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                                    <h3 class="text-center">Order Detail(s)</h3>
                                                            <div class="form-group">
                                                                <table>
                                                                    <tr>
                                                                        <td>{!!Form::label('fullname', 'Full Name')!!}</td>
                                                                        <td>{{$address->fullname}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{!!Form::label('email', 'E-Mail Address')!!}</td>
                                                                        <td>{{$address->email}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{!!Form::label('phone', 'Phone Number')!!}</td>
                                                                        <td>{{$address->phone}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{!!Form::label('city', 'City Name')!!}</td>
                                                                        <td>{{$address->city}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{!!Form::label('state', 'State')!!}</td>
                                                                        <td>{{$address->state}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{!!Form::label('country', 'Country')!!}</td>
                                                                        <td>{{$address->country}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{!!Form::label('fullAddress', 'Full Address')!!}</td>
                                                                        <td>{{$address->fullAddress}}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                    <br>
                                                    <h3 class="text-center">Item Detail(s)</h3>
                                                    <div class="form-group">
                                                        <table>
                                                            <tr>
                                                                <td>{!!Form::label('itemProducts', 'Item Products')!!}</td>
                                                                <td>{{$pro->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{!!Form::label('qty', 'Quantity')!!}</td>
                                                                <td>{{$pro->qty}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{!!Form::label('unitPrice', 'Unit Price')!!}</td>
                                                                <td>{{$pro->price}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{!!Form::label('subTotal', 'Sub Total')!!}</td>
                                                                <td>{{Cart::subtotal()}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{!!Form::label('tax', 'Tax')!!}</td>
                                                                <td>{{Cart::tax()}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{!!Form::label('total', 'Grand Total')!!}</td>
                                                                <td>{{Cart::total()}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection