<?php
    $lang = App::getLocale();
    $currency = Session::get('currency');
?>
<section class="top-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="sub-title text-center">
                    <h4>
                        <img src="{{ asset('frontend/imgs/msg.png') }}" alt="img" /> @lang('frontend.newsletter2')
                    </h4>
                </div>
            </div>
            <div class="col-md-7 col-sm-7">
                <div class="h-search">
                    <div class="form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="sub_email" type="email" placeholder="@lang('frontend.newsletter3')">
                            <button type="submit" class="sub btn btn-default" data-token="{{ csrf_token() }}"> @lang('frontend.newsletter4')</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="footer-info">
                    <a href="/">
                        <img src="{{ asset('frontend/imgs/flogo.png') }}" alt="img" />
                    </a>
                    <p>
                        {{ $option['description_'.$lang] }}
                    </p>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="imp-links">
                    <h4>@lang('frontend.pages')</h4>
                    <ul class="list-unstyled">
                        <li>
                            <a href="/">@lang('frontend.home')</a>
                        </li>
                        <li><a href="{{ route('page', 10) }}">@lang('frontend.help')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('frontend.contact')</a></li>
                        @auth
                            <li><a href="{{ route('profile', Auth::user()->id) }}">@lang('frontend.profile')</a></li>
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
                            @if (Auth::user()->type == 1)
                                <li><a href="{{ route('store', Auth::user()->id) }}">@lang('frontend.my_store')</a></li>
                                <li><a href="{{ route('sellings') }}">@lang('frontend.my_sellings')</a></li>
                            @endif
                        @else
                            <li>
                                <a href="{{ route('login') }}">@lang('frontend.login1')</a>
                            <li>
                                <a href="{{ route('register') }}">@lang('frontend.register')</a>
                            </li>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="imp-links">
                    <h4>@lang('frontend.importantPages')</h4>
                    <ul class="list-unstyled">
                        @foreach ($pages->slice(0, 5) as $page)
                            <li><a href="{{ route('page', $page->id) }}">{{ $page['title_'.$lang] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="imp-links">
                    <h4>@lang('frontend.cat')</h4>
                    <ul class="list-unstyled">
                        @foreach($categories->slice(0 , 3) as $category)
                            <li>
                                <a href="{{ route('category' , $category->id) }}">{{ $category['name_'.$lang] }}</a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ route('all_category') }}">@lang('frontend.all_catt')</a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </div>
</footer>
<section class="se-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="social-links">
                    <ul class="list-inline">
                        <li>
                            <h5>Contact & Follow Us :</h5>
                        </li>
                        @if (isset($option->facebook))
                            <li><a href="{{ $option->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if (isset($option->twitter))
                            <li><a href="{{ $option->twitter }}"><i class="fa fa-twitter"></i></a></li>
                        @endif
                        @if (isset($option->youtube))
                            <li><a href="{{ $option->youtube }}"><i class="fa fa-youtube"></i></a></li>
                        @endif
                        @if (isset($option->instagram))
                            <li><a href="{{ $option->instagram }}"><i class="fa fa-instagram"></i></a></li>
                        @endif
                        @if (isset($option->google))
                            <li><a href="{{ $option->google }}"><i class="fa fa-google"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="design text-left">
                    <a href="https://7loll.net/">Designed & Developed By 7loll.com</a>
                </div>
            </div>
        </div>
    </div>

</section>
<div class="fl"></div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/inc/nav/js/bootstrap-dropdownhover.min.js') }}"></script>
<script src="{{ asset('frontend/inc/carousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/star-rating.min.js') }}"></script>
<script src="{{ asset('frontend/js/xzoom.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('common/custom.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script>
    $('#resultsBox li:first').addClass('in');
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@section('frontend-footer')

@show

