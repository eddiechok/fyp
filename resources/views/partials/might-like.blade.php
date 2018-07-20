<div class="might-like-section">
    <div class="container">
        <h2>You might also like...</h2>
        <div class="might-like-grid">
            @foreach($mightAlsoLike as $product)
              <a href="{{route('shop.show', $product->id)}}" class="might-like-product">
                  <img src="{{ productImage($product->img_default) }}" height="110" alt="{{$product->name}}">
                  <div class="might-like-product-name">{{$product->name}}</div>
                  <div class="might-like-product-price">{{$product->presentPrice()}}</div>
              </a>
            @endforeach
        </div>
    </div>
</div>
