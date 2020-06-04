    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#profile1" aria-controls="profile1" role="tab" data-toggle="tab">
                <i class="fa fa-user"></i>
                @lang('frontend.profile')
            </a>
        </li>
        <div class="clearfix"></div>
        @if (isset(Auth::user()->id) && $user->id == Auth::user()->id)
        <li role="presentation">
            <a href="#profile2" aria-controls="profile2" role="tab" data-toggle="tab">
                <i class="fa fa-map-marker"></i>
                @lang('frontend.my_addresses')
            </a>
        </li>
        @endif
        <div class="clearfix"></div>
        <li role="presentation">
            <a href="#profile3" aria-controls="profile3" role="tab" data-toggle="tab">
                <i class="fa fa-table"></i>
                @lang('frontend.my_orders')
            </a>
        </li>
        <div class="clearfix"></div>
        <li role="presentation">
            <a href="#profile4" aria-controls="profile4" role="tab" data-toggle="tab">
                <i class="fa fa-heart"></i>
                @lang('frontend.wishlist')
            </a>
        </li>
        <div class="clearfix"></div>
        @if (Auth::user()->type == 1)
            <li title="@lang('frontend.my_store')" role="presentation">
                <a href="{{ route('store', Auth::user()->id) }}">
                    <i class="fa fa-lock"></i>
                    @lang('frontend.my_store')
                </a>
            </li>
            <li title="@lang('frontend.my_sellings')" role="presentation">
                <a href="{{ route('sellings') }}">
                    <i class="fa fa-money"></i>
                    @lang('frontend.my_store')
                </a>
            </li>
        @endif
    </ul>
    {{--<div class="secur-l1">
        <ul class="list-unstyled">
            <li>@lang('frontend.main_info')</li>
            <li><a href="{{ route('profileEdit') }}">@lang('frontend.edit_profile')</a></li>
            <li><a href="{{ route('purchases') }}">@lang('frontend.my_buyings')</a></li>
            <li><a href="{{ route('orders') }}">@lang('frontend.my_orders')</a></li>
            <li><a href="{{ route('wishlist', Auth::user()->id) }}">@lang('frontend.wishlist')</a></li>
        </ul>
    </div>
    <div class="secur-l1">
        <ul class="list-unstyled">
            <li>@lang('frontend.my_addresses')</li>
            <li><a href="{{ route('addresses') }}">@lang('frontend.show_all')</a></li>
            <li><a href="{{ route('addressForm') }}">@lang('frontend.add_address')</a></li>
        </ul>
    </div>
</div>
@if (Auth::user()->type == 1)
<div class="secur-links" style="margin-top: 40px;">
    <h3>@lang('frontend.my_store')</h3>
    <div class="secur-l1">
        <ul class="list-unstyled">
            <li><a href="{{ route('store', Auth::user()->id) }}">@lang('frontend.my_store')</a></li>
            <li><a href="{{ route('sellings') }}">@lang('frontend.my_sellings')</a></li>
        </ul>
    </div>
</div>
@endif--}}