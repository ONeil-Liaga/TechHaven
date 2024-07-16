<div class="products mb-3">
    <div class="row justify-content-center">
        @foreach($getProduct as $value)
            @php
                $getProductImage = $value->getImageSingle($value->id);
            @endphp


        <div class="col-12 @if(!empty($is_home)) col-md-3 col-lg-3 @else col-md-4 col-lg-4 @endif ">
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <a href="{{ url($value->slug) }}">
                        @if(!empty($getProductImage) && !empty($getProductImage->getLogo()))
                          <img style="height: 280px;width: 100%;object-fit: cover;" src="{{ $getProductImage->getLogo() }}" alt="{{ $value->title }}" class="product-image">
                        @endif
                    </a>

                    <div class="product-action-vertical">
                        @if(!empty(Auth::check()))
                           <a href="javascript:;" data-toggle="modal" class=" add_to_wishlist add_to_wishlist{{ $value->id }} btn-product-icon btn-wishlist btn-expandable {{ !empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : '' }}"  id="{{ $value->id }}" title="Wishlist"><span>add to wishlist</span></a>
                        @else
                            <a href=" " data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>add to wishlist</span></a>
                        @endif
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="{{ url($value->category_slug.'/'.$value->sub_category_slug) }}">{{ $value->sub_category_name }}</a>
                    </div>
                    <h3 class="product-title"><a href="{{ url($value->slug) }}">{{ $value->title }}</a></h3>
                    <div class="product-price">
                        Ksh{{ number_format($value->price, 2) }}
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: {{ $value->getReviewRating($value->id) }}%;"></div>
                        </div>
                        <span class="ratings-text">( {{ $value->getTotalReview() }} Reviews )</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
