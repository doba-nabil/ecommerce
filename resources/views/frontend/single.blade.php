<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', $product['name_'.$lang])
@section('frontend-main')
    <section class="page-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline">
                        <li>
                            <a href="/">@lang('frontend.home')</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>@if(!empty($product->category)) {{ $product->category['name_'.$lang] }} @endif  @if(!empty($product->subcategory)) / {{ $product->subcategory['name_'.$lang] }} @endif @if(!empty($product->subsubcategory)) / {{ $product->subsubcategory['name_'.$lang] }} @endif</li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>{{ $product['name_'.$lang] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="product-det-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="xzoom-con">
                        <div class="xzoom-container">
                            <img class="xzoom" id="xzoom-default" src="{{ asset('pictures/products/' . $product->picture) }}" xoriginal="{{ asset('pictures/products/' . $product->picture) }}" />
                            <div class="xzoom-thumbs">
                                @foreach ($product->images as $image)
                                    <a href="{{ asset('pictures/products/' . $image->path) }}"><img class="xzoom-gallery" width="80" src="{{ asset('pictures/products/' . $image->path) }}"  xpreview="{{ asset('pictures/products/' . $image->path) }}" title="{{ $product['name_'.$lang] }}" alt="{{ $product['name_'.$lang] }}"></a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="product-content">
                        <h3>{{ $product['name_'.$lang] }}</h3>
                        <br>
                        <h5>{{ $product->code }}</h5>
                        <div class="price">
                            @if ($product->discount !== null)
                                <h4>{{ $product->discount }} {{ $product->currency['name_'.$lang] }}</h4>
                                <span class="sale">{{ $product->price }} {{ $product->currency['name_'.$lang] }}</span>
                                <span>@lang('frontend.discount1')
                                    <?php
                                    $offerRate = $product->discount/$product->price*100;
                                    $offerRate = 100 - $offerRate;
                                    echo round($offerRate) . '%';
                                    ?>
                                    </span>
                            @else
                                <h4>{{ $product->price }} {{ $product->currency['name_'.$lang] }}</h4>
                            @endif
                            <br>
                            <span class="availble">available <span>in stock</span></span>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="evaluate">
                            <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating() }}" data-size="xs" disabled="">
                        </div>
                    </div>

                    <div class="product-l-cart">
                        <ul class="list-inline">
                            <form style="display: inline-block" action="{{ route('addToCart', $product->id) }}" method="post" id="add_cart">
                                {{ csrf_field() }}
                                @if (count($product->colors))
                                    <div class="color">
                                        <h4 style="margin-bottom: 22px;">@lang('frontend.avColors')</h4>
                                        @foreach ($product->colors as $color)
                                            <div class="col-md-3 col-sm-3 col-xs-6 input-image" style="padding: 0 8px;">
                                                <input type="radio" name="color" class="colorSelect" id="color_{{ $color->id }}" value="{{ $color->id }}"/>
                                                <label for="color_{{ $color->id }}">
                                                    <img src="{{ asset('pictures/colors/' . $color->path) }}"/>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="clearfix"></div>
                                <hr>
                                @if (count($product->details) > 0)
                                    <div class="pro-tab">
                                        <div class="tab-content">
                                            <h4 style="margin-bottom: 22px;">@lang('frontend.avSizes')</h4>
                                            @foreach ($product->details as $size)
                                                <div class="size_radio">
                                                    <input type="radio" name="size" class="sizesSelect" id="size_{{ $size->id }}" value="{{ $size->id }}"/>
                                                    <label for="size_{{ $size->id }}">
                                                        <h4>{{ $size->value }}</h4>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <br>
                                @endif
                                <div class="product-det2">
                                    @auth()
                                        <li>
                                            <a role="button" product="{{ $product->id }}" data-token="{{ csrf_token() }}" class="favourite_add
                                                    @foreach ($product->wishes as $favourite)
                                            @if (isset(Auth::user()->id) && $favourite->user_id == Auth::user()->id)
                                                    color55
                                            @endif
                                            @endforeach
                                                    ">
                                                <i class="fa fa-heart-o"></i>
                                                <input type="text" id="wishesCount" value="{{ count($product->wishes) }}" disabled>
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a style="cursor: pointer" type="button" data-toggle="modal" data-target="#myModal1">
                                                <i class="fa fa-heart-o"></i> {{ count($product->wishes) }}
                                            </a>
                                        </li>
                                    @endauth
                                    <div style="display: inline-block" class="pices">
                                        <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">
                                            <span>
                                                <i class="fa fa-angle-up"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="number" name="qty" value="{{ $product->min_qty }}"/>
                                        <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">
                                            <span>
                                                <i class="fa fa-angle-down"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <li class="submit">
                                        <button type="submit">@lang('frontend.add_cart')</button>
                                    </li>
                                </div>

                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="prod-tab-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#pro1" aria-controls="pro1" role="tab" data-toggle="tab">@lang('frontend.details')</a>
                            </li>
                            <li role="presentation">
                                <a href="#pro3" aria-controls="pro3" role="tab" data-toggle="tab">@lang('frontend.comments') ({{ count($comments) }}) </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="pro1">
                                <h4>@lang('frontend.details')</h4>
                                <div class="pro-con">
                                    <?php echo htmlspecialchars_decode($product['description_'.$lang]) ?>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="pro3">
                                <div class="feed-back">
                                    <ul class="list-unstyled">
                                        @if (count($comments) > 0)
                                            @foreach ($comments as $comment)
                                        <li>
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <div class="comm-name">
                                                    <h4><a href="{{ route('profile', $comment->user->id) }}">{{ $comment->user->name }}</a></h4>
                                                    <h5>{{ $product['name_'.$lang] }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <div class="comm-rate  text-center">
                                                    <h5>{{ $comment->comment }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <div class="comm-date text-right">
                                                    <h4>{{ $comment->created_at->toDateString() }}</h4>
                                                    <div class="evaluate">
                                                        <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $userRate->rating }}" data-size="xs" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                            @endforeach
                                        @else
                                            <p class="alert alert-info">@lang('frontend.no_comments')</p>
                                        @endif
                                    </ul>
                                </div>
                                @auth()
                                    <div class="write-comm" id="write-comm">
                                        <h4>@lang('frontend.add_comment'):</h4>
                                        <form action="{{ route('storeComment', $product->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-size="xs">
                                                <textarea class="form-control" name="comment" required rows="5">{{ old('comment') }}</textarea>
                                            </div>
                                            <button type="submit" class="">@lang('frontend.send')</button>
                                        </form>
                                    </div>
                                @endauth()
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="related-pro">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ad">
                        <a href="{{ $product->category->link }}"><img src="{{ asset('pictures/categories_banners/' . $product->category->banner) }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="rel-tilte">
                        <h4>@lang('frontend.related_product')</h4>
                    </div>
                </div>

                <div class="col-md-12">
                    @if(count($relateds) > 0)
                    <div id="owl-demo4" class="owl-carousel owl-theme">
                        @foreach($relateds as $bestproduct)
                        <div class="item">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="{{ route('single', $bestproduct->id) }}">
                                        <img class="pic-1" src="{{ asset('pictures/products/' . $bestproduct->picture) }}">
                                    </a>
                                    <h5 class="p-title">
                                                <span class="sale"><?php
                                                    $offerRate = $bestproduct->discount/$bestproduct->price*100;
                                                    $offerRate = 100 - $offerRate;
                                                    echo round($offerRate) . '%';
                                                    ?>
                                                </span>
                                        @if($bestproduct->arrival == 1)
                                            <span class="new">New</span>
                                        @endif
                                    </h5>
                                    <ul class="social">
                                        @auth()
                                            <li>
                                                <a role="button" product="{{ $bestproduct->id }}" data-token="{{ csrf_token() }}" class="favourite_add
                                                    @foreach ($bestproduct->wishes as $favourite)
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
                                            <a href="#" data-tip="Add to Search">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-tip="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h3 class="title">
                                        <a href="{{ route('single', $bestproduct->id) }}">{{ mb_strimwidth($bestproduct['name_'.$lang] , 0, 33, "...") }}</a>
                                    </h3>
                                    <div class="price">
                                        <div class="price discount"><span>{{ $bestproduct->price }} {{ $bestproduct->currency['name_'.$lang] }}</span>{{ $bestproduct->discount }} {{ $bestproduct->currency['name_'.$lang] }}</div>
                                    </div>
                                    <h5>
                                        <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $bestproduct->averageRating }}" data-size="xs" disabled="">
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="customNavigation">
                        <a class="prev"><i class="fa fa-angle-right"></i></a>
                        <a class="next"><i class="fa fa-angle-left"></i></a>
                    </div>
                    @else
                        <div class="col-md-12">
                            <h4 class="alert alert-warning">@lang('frontend.no_products')</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('frontend-footer')
    <script>
        function increaseValue() {
            var value = parseInt(document.getElementById('number').value, {{ $product->qty }});
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number').value = value;
        }

        function decreaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            document.getElementById('number').value = value;
        }
    </script>
    <script>
        $("#add_cart").submit(function(e) {
            var url = "{{ route('addToCart', $product->id) }}";
            $.ajax({
                type: "POST",
                url: url,
                data: $("#add_cart").serialize(),
                success: function() {
                    alert('تمت اضافة المنتج الى السلة بنجاح');
                }
            });
            e.preventDefault();
        });
    </script>
    <script>
        var $radio = $('.sizesSelect');

        if (!$radio.filter(':checked').length) {
            $radio[0].checked = true;
        }
    </script>
    <script>
        var $radio = $('.colorSelect');

        if (!$radio.filter(':checked').length) {
            $radio[0].checked = true;
        }
    </script>
@endsection