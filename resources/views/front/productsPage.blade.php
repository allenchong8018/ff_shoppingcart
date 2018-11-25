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