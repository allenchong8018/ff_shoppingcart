@extends('front.master')
  @section('content')

	  <section class="products-featured section">
		  <div class="container">
			  <ul class="tabs" data-tabs>
				  <li class="tab-title"><a href="#featured-products">Featured Products</a></li>
				  <li class="tab-title"><a href="#best-sellers">Best Sellers</a></li>
				  <li class="tab-title"><a href="#top-searches">Popular Searches</a></li>
			  </ul>
		  </div>
	  </section>

	  {{--Add Cart Message--}}
	  @if (session('status'))
		  <div class="alert alert-success">
			   {{ session('status') }}
		  </div>
	  @endif
	  {{--End of Add Cart Message--}}

	  <section class="products-new section">
		  <h3 class="section-title">All Products</h3>
		  <div class="container">
			  @foreach($data as $p)

				  <article class="product-grid-item product-block">
					  <figure class="product-item-thumbnail">
						  <a href="{{url('/productsDetails')}}/{{$p->pro_name}}">
							  <img
									  src="{{asset('/img/')}}/{{$p->pro_img}}" alt=""
									  width="400px" height="360px" />
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

						  <!-- snippet location product_rating -->
						  <div class="product-item-price" data-product-price="JPY1,650">
							  <div>

								  <div class="product-price-line" data-product-price-wrapper="without-tax">
									  {{--<span class="price-rrp highlight">RM-</span>--}}
									  <meta itemprop="price" content="1650">
									  <meta itemprop="priceCurrency" content="">
									  <meta itemprop="availability" content="">
									  <meta itemprop="itemCondition" itemtype="http://schema.org/OfferItemCondition" content="http://schema.org/Condition">
									  <span class="price-value"> RM{{$p->pro_price}}</span>
								  </div>

							  </div>
						  </div>


						  <div class="mobile-add-to-cart">
							  <a href="{{url('/cart/add')}}/{{$p->id}}" class="button add-cart-cat button--small card-figcaption-button">Add to Cart</a>
						  </div>

					  </div>
				  </article>
			  @endforeach


		  </div>
	  </section>

@endsection
