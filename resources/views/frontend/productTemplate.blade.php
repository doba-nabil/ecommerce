    <div class="product-grid">
        <div class="product-image">
            <a href="{{ route('single', $product->id) }}">
                <img class="pic-1" src="{{ asset('pictures/products/' . $product->picture) }}">
            </a>
            <h5 class="p-title">
                <span class="sale"><?php
                    $offerRate = $product->discount/$product->price*100;
                    $offerRate = 100 - $offerRate;
                    echo round($offerRate) . '%';
                    ?>
                </span>
                @if($product->arrival == 1)
                    <span class="new">New</span>
                @endif
            </h5>
            <ul class="social">
                @auth()
                    <li>
                        <a role="button" product="{{ $product->id }}" data-token="{{ csrf_token() }}" class="favourite_add
                                                    @foreach ($product->wishes as $favourite)
                        @if (isset(Auth::user()->id) && $favourite->user_id == Auth::user()->id)
                                color55
                        @endif
                        @endforeach
                                " data-tip="Add to Wishlist">
                            <i class="fa fa-heart-o"></i>
                        </a>
                    </li>
                @else
                    <li>
                        <a style="cursor: pointer" type="button" data-toggle="modal" data-target="#myModal1" data-tip="Add to Wishlist">
                            <i class="fa fa-heart-o"></i>
                        </a>
                    </li>
                @endauth
                <li>
                    <a href="{{ route('single', $product->id) }}" data-tip="Add to Search">
                        <i class="fa fa-eye"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('single', $product->id) }}" data-tip="Add to Cart">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="product-content">
            <h3 class="title">
                <a href="{{ route('single', $product->id) }}">{{ mb_strimwidth($product['name_'.$lang] , 0, 33, "...") }}</a>
            </h3>
            <div class="price">
                <div class="price discount"><span>{{ $product->price }} {{ $product->currency['name_'.$lang] }}</span>{{ $product->discount }} {{ $product->currency['name_'.$lang] }}</div>
            </div>
            <h5>
                <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="xs" disabled="">
            </h5>
        </div>
    </div>