<?php
    $lang = App::getLocale();
    $currency = Session::get('currency');
?>
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="top-info" data-hover="dropdown" data-animations="fadeInDown fadeInDown fadeInDown fadeInDown">
                    <ul class="list-inline">
                        <li class="dropdown">
                            <a href="#"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('pictures/countries/' . $currentLanguage->country->picture) }}" alt="img"/>
                                <span>{{ $currentLanguage['name_'.$lang] }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($currencies as $currency)
                                    <li class="dropdown" >
                                        <a href="{{ route('currencyConvert', $currency->id) }}">
                                            <img src="{{ asset('pictures/countries/' . $currency->country->picture) }}" alt="{{ $currency['name_'.$lang] }}"/>
                                            <span>{{ $currency['name_'.$lang] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>@lang('frontend.free')</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="top-links text-left">
                    <ul class="list-inline">
                        @guest()
                            <li><a href="{{ route('login') }}">@lang('frontend.login1')</a></li>
                            <li><a href="{{ route('register') }}">@lang('frontend.register')</a></li>
                        @else
                                <li class="dropdown ddd">
                                    <a class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer">@lang('frontend.profile')<span class="caret" style="margin-right: 8px;"></span></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="{{ route('profile', Auth::user()->id) }}">@lang('frontend.profile')</a></li>
                                        @if (Auth::user()->type == 1)
                                            <li><a href="{{ route('store', Auth::user()->id) }}">@lang('frontend.my_store')</a></li>
                                            <li><a href="{{ route('sellings') }}">@lang('frontend.my_sellings')</a></li>
                                        @endif
                                        <li><a href="{{ route('purchases') }}">@lang('frontend.my_buyings')</a></li>
                                        <li><a href="{{ route('orders') }}">@lang('frontend.my_orders')</a></li>
                                        <li><a href="{{ route('addresses') }}">@lang('frontend.my_addresses')</a></li>
                                        <li><a href="{{ route('wishlist', Auth::user()->id) }}">@lang('frontend.wishlist') ({{ $wishes }})</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{ route('profileEdit') }}">@lang('frontend.edit_profile')</a></li>
                                        @if (isset(Auth::user()->id) && Auth::user()->type == 0)
                                            <li><a href="{{ route('packages') }}">@lang('frontend.start_selling')</a></li>
                                        @endif
                                        <li role="separator" class="divider"></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                @lang('frontend.logout')
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                        @endguest
                        <li><a href="{{ route('page', 10) }}">@lang('frontend.help')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('frontend.contact')</a></li>
                        @if (isset(Auth::user()->id) && Auth::user()->type == 0)
                            <li><a href="{{ route('packages') }}">@lang('frontend.seel')</a></li>
                        @else
                            <li><a href="{{ route('addProductForm') }}">@lang('frontend.addd')</a></li>
                        @endif
                            @if($lang == 'ar')
                                <li><a href="{{ route('language', 'en') }}">English</a></li>
                            @else
                                <li><a href="{{ route('language', 'ar') }}">عربي</a></li>
                            @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="logo">
                    <a href="{{ route('frontendHome') }}"><img src="{{ asset('frontend/imgs/logo.png') }}" alt="imgs"/></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="h-search">
                    <form action="{{ route('simpleSearch') }}" method="get" class="search-f">
                        <div class="form-group">
                            <button type="submit"><i class="fa fa-search"></i></button>
                            <input type="text" class="form-control" name="word" placeholder="@lang('frontend.search')">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="cart">
                    <h5>
                        <a href="{{ route('cart') }}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </h5>
                    <h5>
                        <a href="{{ route('cart') }}">
                            <span>@lang('frontend.products_no') :</span>
                            <span>{{ Cart::instance('default')->count() }} @lang('frontend.pro')</span>
                        </a>
                        {{--<ul class="dropdown-menu cart-m">
                            <li><a href="{{ route('cart') }}" class="text-center">@lang('frontend.cart')</a></li>
                            @if (count(Cart::instance('default')->content()) > 0)
                                @foreach (Cart::instance('default')->content() as $item)
                                    <li>
                                        <a href="{{ route('single', $item->model->id) }}">
                                            <img src="{{ asset('pictures/products/' . $item->model->picture) }}" alt="{{ $item->name }}" style="margin-left: 10px;">
                                            <span>{{ mb_strimwidth($item->name , 0, 22, "...") }}</span>
                                            <span>{{ $item->total }} {{ $item->model->currency['name_'.$lang] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                                <li><a href="{{ route('cart') }}" class="cart-pay">@lang('frontend.checkout')</a></li>
                            @else
                                <li><a href="{{ route('frontendHome') }}" class="cart-pay">@lang('frontend.cart_empty11')</a></li>
                            @endif
                        </ul>--}}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="clearfix"></div>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div class="collapse navbar-collapse js-navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('frontendHome') }}">@lang('frontend.home')</a>
                </li>
                <li>
                    <a href="{{ route('all_category') }}">@lang('frontend.all_catt')</a>
                </li>
                @foreach($categories as $category)
                <li class="dropdown ddd mega-dropdown">
                    @if(count($category->subcategories) != 0)
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category['name_'.$lang] }}
                        </a>
                    @else
                        <a href="{{ route('category' , $category->id) }}" class="dropdown-toggle">{{ $category['name_'.$lang] }}
                        </a>
                    @endif
                    @if(count($category->subcategories) > 3)
                        <ul class="dropdown-menu mega-dropdown-menu">
                            @foreach($category->subcategories as $sub)
                            <li class="col-sm-3">
                                <ul>
                                    <a href="{{ route('subcategory' , $sub->id) }}"><li class="dropdown-header">{{ $sub['name_'.$lang] }} </li></a>
                                    @foreach($sub->subsubcategories->slice(0,3) as $subsub)
                                    <li>
                                        <a href="{{ route('subsubcategory' , $subsub->id) }}">{{ $subsub['name_'.$lang] }}</a>
                                    </li>
                                    @endforeach
                                    {{--<li class="divider"></li>
                                    <li class="dropdown-header">Fonts</li>
                                    <li>
                                        <a href="#">Glyphicon</a>
                                    </li>
                                    <li>
                                        <a href="#">Google Fonts</a>
                                    </li>--}}
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    @elseif(count($category->subcategories) == 0)
                    @else
                    <ul class="dropdown-menu mega-dropdown-menu">
                        @foreach($category->subcategories as $sub)
                        <li class="col-md-4 col-sm-4 ">
                            <ul class="col-md-6 col-sm-6 col-xs-6">
                                <div class="dropdown-image">
                                    <a href="{{ route('subcategory' , $sub->id) }}">
                                        <img style="width: 100%;padding: 0 20px" src="{{ asset('pictures/subcategories/' . $sub->picture) }}" alt="img" />
                                    </a>
                                </div>
                            </ul>
                            <ul class="list-unstyled col-md-6 col-sm-6 col-xs-6">
                                <li class="dropdown-header">{{ $sub['name_'.$lang] }}</li>
                                @foreach($sub->subsubcategories->slice(0,3) as $subsub)
                                <li>
                                    <a href="{{ route('subsubcategory' , $subsub->id) }}">{{ $subsub['name_'.$lang] }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /.nav-collapse -->
</nav>