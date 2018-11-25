@extends('front.master')

@section('content')
    {{--Add Cart Message--}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {{--End of Add Cart Message--}}
    <div class="site-canvas">
        <div class="on-canvas">
            <main class="main-content">
                <div class="breadcrumbs-container">
                    <ul class="breadcrumbs">
                        <li class="breadcrumb ">
                            {{--<a href="" itemprop="url" class="breadcrumb-label breadcrumb-link"><span itemprop="name">Home</span></a>--}}
                            <span itemprop="name">Home</span>
                        </li>
                        <li class="breadcrumb ">
                            {{--<a href="#" itemprop="url" class="breadcrumb-label breadcrumb-link"><span itemprop="name">Products Details</span></a>--}}
                            <span itemprop="name">Products Details</span>
                        </li>
                        <li class="breadcrumb ">
                            {{--<a href="#" itemprop="url" class="breadcrumb-label breadcrumb-link"><span itemprop="name">{{$data[0]->pro_name}}</span></a>--}}
                            <span itemprop="name">{{$data[0]->pro_name}}</span>
                        </li>
                    </ul>
                </div>
            </main>
        </div>
    </div>

    <section class="product-details product-block section product-single product-description-first">
        <div class="container">
            <div>
                <div class="product-details-column">
                    <div class="product-images-container">
                        <div class="product-images-loader">
                            <svg class="icon icon-spinner"><use xlink:href="#icon-spinner" /></svg>
                        </div>

                        <div class="product-slides-container">
                            <div class="product-slides-wrap">
                                <img src="{{url('/img/')}}/{{$data[0]->pro_img}}">
                            </div>
                        </div>
                        <p style="text-align: center; text-transform: uppercase;"></p>
                        <div class="product-images-pagination">
                            <div class="pagination-item">
                                <img src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-details-column">



                    <h1 class="product-title" itemprop="name">{{$data[0]->pro_code}}</h1>

                    <div class="product-price" itemprop="offers">
                        <div>

                            <div class="product-price-line" data-product-price-wrapper="without-tax">
                                {{--<span class="price-rrp highlight"></span>--}}
                                {{--<meta itemprop="price" content="1650">--}}
                                {{--<meta itemprop="priceCurrency" content="JPY">--}}
                                {{--<meta itemprop="availability" content="">--}}
                                {{--<meta itemprop="itemCondition">--}}
                                <span class="price-value"> RM{{$data[0]->pro_price}}</span>

                            </div>



                            {{--<div class="price-you-save" data-product-price-saved>--}}
                                {{--You save: JPY294--}}

                                {{--<!-- Show Percentage Off -->--}}
                                {{--<p style="color: red;font-size: 1.2em;margin: 0 10px;display: inline-block;background: #fde6ca;border-radius: 20px;padding: 0 15px;">--}}
                                    {{--15% Off!</p>--}}

                            {{--</div>--}}
                        </div>

                    </div>

                    <div class="product-rating-block" >
                        {{--<div class="product-item-rating">--}}
              {{--<span class="">--}}
    {{--<svg class="icon icon-star"><use xlink:href="#icon-star" /></svg>--}}
  {{--</span>--}}
                            {{--<span class="">--}}
    {{--<svg class="icon icon-star"><use xlink:href="#icon-star" /></svg>--}}
  {{--</span>--}}
                            {{--<span class="">--}}
    {{--<svg class="icon icon-star"><use xlink:href="#icon-star" /></svg>--}}
  {{--</span>--}}
                            {{--<span class="">--}}
    {{--<svg class="icon icon-star"><use xlink:href="#icon-star" /></svg>--}}
  {{--</span>--}}
                            {{--<span class="">--}}
    {{--<svg class="icon icon-star"><use xlink:href="#icon-star" /></svg>--}}
  {{--</span>--}}
                            {{--<span class="reviews-jumplink total-reviews" data-scroll="#product-reviews">--}}
              {{--( <a class="product-reviews-link link" href="#product-reviews">0 Reviews</a> )--}}
            {{--</span>--}}
                        {{--</div>--}}

                        <!-- snippet location product_rating -->
                    </div>


                    <div class="product-stock">
                        {{--<span class="" data-product-stock>Current stock:</span>--}}
                        {{--<span class="" data-product-stock data-product-stock-level>6</span>--}}
                    </div>


                    <hr>


                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="50062" data-product-id/>

                        <div class="product-options-container" data-product-option-change>

                        </div>


                        <div class="product-quantity-submit">
                            <div class="product-quantity-container">
                                <div class="form-field form-inline">
                                    <label class="form-label">
                                        <strong class="form-label-text">Qty:</strong>
                                        <input
                                                type="text"
                                                class="product-quantity form-input"
                                                name="qty[]"
                                                value="1"
                                                min="0"
                                                pattern="[0-9]+"
                                        >

                                    </label>
                                </div>

                                <div class="share-block">
                                    <span class="form-label-text share-title">Share:</span>
                                    <nav class="share-buttons-nav">
                                        <ul class="share-buttons" data-share-buttons>

                                            <li class="social-link facebook">
                                                <a target="_blank" href="#" class="facebook">
                                                    <svg width="24" height="30" viewBox="0 0 8 16" xmlns="http://www.w3.org/2000/svg"><title>facebook</title><path d="M0 5.292h1.655V3.684c0-.71.018-1.803.532-2.48C2.73.487 3.474 0 4.755 0 6.842 0 7.72.297 7.72.297l-.412 2.45s-.69-.198-1.333-.198c-.644 0-1.22.23-1.22.872v1.87h2.638L7.21 7.685H4.754V16h-3.1V7.685H0V5.292"/></svg>
                                                </a>
                                            </li>

                                            <li class="social-link print">
                                                <a class="print" href="javascript:;" onclick="window.print()">
                                                    <svg width="32" height="28" viewBox="0 0 19 16" xmlns="http://www.w3.org/2000/svg"><title>printer</title><path d="M17.776 3.62h-3.09V.53c0-.293-.24-.53-.532-.53H4.152c-.292 0-.53.237-.53.53v3.092H.53c-.293 0-.53.236-.53.53v8.277c0 .292.237.53.53.53h2.955v2.51c0 .293.237.53.53.53h10.14c.292 0 .53-.237.53-.53v-2.51h3.09c.294 0 .53-.238.53-.53V4.15c.002-.292-.235-.53-.53-.53zm-12.404 0V1.75h7.563v1.87H5.372zm7.574 4.323v6.307h-7.6V7.943h7.6z"/></svg>
                                                </a>
                                            </li>


                                            <li class="social-link twitter">
                                                <a target="_blank" href="#" class="twitter">
                                                    <svg width="32" height="28" viewBox="0 0 18 14" xmlns="http://www.w3.org/2000/svg"><title>twitter</title><path d="M17.228 1.657c-.633.28-1.315.472-2.03.557.73-.437 1.29-1.13 1.554-1.955-.683.403-1.438.698-2.245.855C13.863.43 12.944 0 11.927 0c-1.95 0-3.533 1.583-3.533 3.534 0 .277.03.546.09.805C5.548 4.19 2.945 2.785 1.2.644.894 1.17.72 1.777.72 2.425c0 1.224.625 2.306 1.573 2.94-.578-.017-1.124-.178-1.6-.44v.043c0 1.713 1.217 3.142 2.835 3.465-.296.083-.61.125-.93.125-.23 0-.45-.02-.667-.063.45 1.404 1.756 2.426 3.303 2.453-1.21.95-2.734 1.514-4.39 1.514-.285 0-.567-.016-.843-.05C1.564 13.416 3.423 14 5.418 14c6.502 0 10.056-5.385 10.056-10.055 0-.154-.003-.308-.01-.458.692-.5 1.292-1.12 1.764-1.83"/></svg>
                                                </a>
                                            </li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <button type="submit" class="button button-primary button-wide add-to-cart button-progress spinner">
                                <a href="{{url('/cart/add')}}/{{$data[0]->id}}">Add to Cart</a>

                            </button>

                            <div class="wishlist-form" data-wishlist-dropdown>
                                <a class="button button-secondary button-wide add-to-wishlist" href="#">Add to Wishlist</a>
                            </div>
                        </div>
                        <div id="shipping-estimate"></div>



                    <div class="product-message-area" data-product-alerts></div>

                </div>

                <!-- snippet location product_details -->
            </div>
        </div>
    </section>
@endsection


