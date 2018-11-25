@extends('front.master')
@section('content')
@include('front.ourJs')

{{--Add Cart Message--}}
@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif
{{--End of Add Cart Message--}}


<div class="greyBg">
    <div class="container">
		<div class="wrapper">
			{{--BreadCrumbs--}}
			<div class="row">
				<div class="col-sm-12">
					<div class="breadcrumbs">
						<ul>
							<li><a href="{{url('products')}}">Home</a></li>
							<li><span class="dot">/</span>
								@if(count($data)=="0")
								<b>{{$catByUser}}</b>
									@else
										@if($catByUser=="All Products")
										<a href="{{url('products')}}">{{$catByUser}}</a>
										@else
										<a href="{{url('products')}}/{{$catByUser}}">{{$catByUser}}</a>
										@endif
							  	@endif
							</li>
						</ul>
					</div>
                </div>
		    </div>
			{{--End of BreadCrumbs--}}
			{{--{{$data}}--}}

			{{--Category and Price Range--}}
			@if(count($data)!="0")
			{{--<h1 class="text-center">{{$catByUser}} </h1>--}}
				<div class="row">
					<div class="col-xs-6 col-sm-3">
						<select id="catID">
						   <option value="">Select a Category</option>
							 @foreach(App\cats::all() as $cList)
						   <option class="option" id="cat{{$cList->id}}" value="{{$cList->id}}">{{$cList->cat_name}}</option>
							@endforeach
					   </select>
					</div>
					<div class="col-xs-6 col-sm-3">
						<select id="priceID">
							<option value="">Select Price Range</option>
							<option value="0-200">0-200</option>
							<option value="210-400">210-400</option>
							<option value="410-600">410-600</option>
						</select>
					</div>
					<div class="col-sm-6 hidden-xs">
						<div class="row">

							<div class="col-sm-4 pull-right">
								<button id="findBtn" class="btn btn-cart_danger" style="color: white; font-weight: bold">Find</button>
							</div>
						</div>
					</div>
				</div>
			@endif
			{{--End of Category and Price Range--}}

			<div class="row top25">
			@if(count($data)=="0")
				<div class="col-md-12" align="center">
					<h1 align="center" style="margin:20px">
					  No products found under
					  {{--<b style="color:red">{{$catByUser}} </b>--}}
						Category </h1>
				</div>
			@else
				<div id="productData">
					<section class="products-new section">
						<h3 class="section-title"></h3>
						<div class="container">
						  @foreach($data as $p)
							<article class="product-grid-item product-block">
								<figure class="product-item-thumbnail">
									<a href="{{url('productsDetails')}}/{{$p->pro_name}}">
										<img src="{{asset('/img/')}}/{{$p->pro_img}}" alt="" width="400px" height="360px" />
										<div class="product-item-mask">
											<div class="product-item-actions">
												<button class="button button-secondary button-short">
													Quick View
												</button>
												<a href="{{url('/cart/add')}}/{{$p->id}}" class="button add-cart-cat button--small card-figcaption-button">Add to Cart</a>
											</div>
										</div>
									</a>
								</figure>

								<div class="product-item-details">
									<div class="product-item-brand"><label><a href="#" alt="">{{$p->pro_name}}</a></label></div>
									<h5 class="product-item-title">
										 {{$p->pro_code}}
									</h5>
								</div>
							</article>
						  @endforeach
						</div>
					</section>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection
