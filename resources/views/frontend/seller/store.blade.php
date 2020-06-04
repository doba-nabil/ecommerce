<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', $store['name_'.$lang])
@section('frontend-main')
    <section class="tab" style="margin-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-head">
                        <h3>@lang('frontend.store_page') "{{ $store['name_'.$lang] }}" <span class="star2 pull-left"> <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $store->averageRating }}" data-size="xs" disabled=""></span></h3>
                        @include('common.done')
                        @include('common.errors')
                    </div>
                </div>

                <div  class="col-md-12 bor">
                    <div class="col-md-12">
                        <div class="mystore">
                            <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#account-settings" data-toggle="tab">@lang('frontend.profile_information')</a></li>
                            <li><a href="#purchases" data-toggle="tab">@lang('frontend.main_address')</a></li>
                            <li><a href="#contact" data-toggle="tab">@lang('frontend.contact')</a></li>
                            <li><a href="#my-stock" data-toggle="tab">@lang('frontend.products')</a></li>
                            @if ($store->package->photos == 1)
                                <li><a href="#my-pic" data-toggle="tab">@lang('frontend.store_album')</a></li>
                            @endif
                            @if ($store->package->reviews == 1)
                                <li><a href="#reviews" data-toggle="tab">@lang('frontend.reviews')</a></li>
                            @endif
                            @if ($store->package->branches == 1)
                                <li><a href="#branches" data-toggle="tab">@lang('frontend.branches')</a></li>
                            @endif
                        </ul>
                    </div>

                    <div class="col-md-12">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="account-settings">
                                <div style="padding: 0" class="profile-box row">
                                    <h4>@lang('frontend.my_store')</h4>
                                    <div class="col-md-3 col-sm-3">
                                        <h5><span>@lang('frontend.store_owner'): <p><a href="{{ route('profile', $store->user->id) }}">{{ $store->user->name }}</a></p></span></h5>
                                    </div>
                                    @if (isset(Auth::user()->id) && $store->user->id == Auth::user()->id)
                                    <div class="col-md-3 col-sm-3">
                                        <h5>
                                            <span>@lang('frontend.package'): <p>{{ $store->package['name_'.$lang] }}</p></span>
                                        </h5>
                                    </div>
                                    @endif
                                    <div class="col-md-3 col-sm-3">
                                        <h5><span>@lang('frontend.store_name'): <p>{{ $store['name_'.$lang] }}</p></span></h5>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <h5>
                                            <span>@lang('frontend.store_category'): <p><a href="{{ route('category', $store->category->id) }}">{{ $store->category->name_ar }}</a></p></span>
                                        </h5>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <h5>
                                            <span>@lang('frontend.currency'): <p>{{ $store->currency['name_'.$lang] }}</p></span>
                                        </h5>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="col-xs-12">
                                        @if (isset($store->description_ar) || isset($store->description_en))
                                            <span>@lang('frontend.store_disc'): <p style="margin: 0">
                                                    <?php $str = $store['description_'.$lang]; echo htmlspecialchars_decode($str); ?>
                                                </p></span>
                                        @endif
                                    </div>
                                    <br>
                                    <div class="account-con">
                                        @if (isset(Auth::user()->id) && $store->user->id == Auth::user()->id)
                                            <a href="{{ route('storeEditForm') }}" class="btn btn-primary" style="width: 100%;border-radius: 0">@lang('frontend.profile_edit')</a>
                                        @elseif (isset(Auth::user()->id) && $store->user->id !== Auth::user()->id)
                                            <a href="" class="btn btn-primary" style="width: 100%;border-radius: 0">@lang('frontend.message')</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="purchases">
                                <div style="padding: 0" class="profile-box row">
                                    <h4>@lang('frontend.my_store')</h4>
                                    <div class="col-md-3">
                                        <h5>@lang('frontend.country'): <p>{{ $store->country['name_'.$lang] }}</p></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>@lang('frontend.city'): <p>{{ $store->city['name_'.$lang] }}</p></h5>
                                        @if (isset($store->address))
                                            <h5>@lang('frontend.address'): <p>{{ $store->address }}</p></h5>
                                        @endif
                                    </div>

                                <div class="col-md-6">
                                    @if ($store->package->days_work == 1 && isset($store->days_work))
                                        <h5>@lang('frontend.store_days'): <p>{{ $store->days_work }} @lang('frontend.day')</p></h5>
                                @endif
                                @if ($store->package->hours_work == 1 && isset($store->hours_work))
                                    <h5>@lang('frontend.store_hours'): <p>{{ $store->hours_work }} @lang('frontend.hour')</p></h5>
                                @endif
                                @if ($store->package->stuff_namber == 1 && isset($store->stuff_namber))
                                    <h5>@lang('frontend.store_stuff'): <p>{{ $store->stuff_namber }} @lang('frontend.employer')</p></h5>
                                @endif
                                        <div class="col-md-3">
                                            @if ($store->package->map == 1 && isset($store->lat))
                                                <h5>@lang('frontend.location'):</h5>

                                                <div id="map-canvas"></div>
                                            @endif
                                        </div>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="contact">
                                <div style="padding: 0" class="profile-box row">
                                    <h4>@lang('frontend.my_store')</h4>
                                    <div class="col-xs-12">
                                        @if ($store->package->phone == 1 && isset($store->phone))
                                            <h5 style="border: 1px solid gray;display: inline-block;padding: 10px 20px">@lang('frontend.phone'): <p>{{ $store->phone }}</p></h5>
                                        @endif
                                        @if ($store->package->mobile == 1 && isset($store->phone))
                                            <h5 style="border: 1px solid gray;display: inline-block;padding: 10px 20px">@lang('frontend.mobile'): <p>{{ $store->mobile }}</p></h5>
                                        @endif
                                        @if ($store->package->email == 1 && isset($store->email))
                                            <h5 style="border: 1px solid gray;display: inline-block;padding: 10px 20px">@lang('frontend.email'): <p>{{ $store->email }}</p></h5>
                                        @endif
                                        @if ($store->package->website == 1 && isset($store->website))
                                            <h5 style="border: 1px solid gray;display: inline-block;padding: 10px 20px">@lang('frontend.website'): <p>{{ $store->website }}</p></h5>
                                        @endif
                                        @if ($store->package->social == 1 )
                                            @if (isset($store->facebook))
                                                <h5 style="border: 1px solid gray;display: inline-block;padding: 10px 20px">@lang('frontend.facebook'): <p>{{ $store->facebook }}</p></h5>
                                            @endif
                                            @if (isset($store->twitter))
                                                <h5 style="border: 1px solid gray;display: inline-block;padding: 10px 20px">@lang('frontend.twitter'): <p>{{ $store->twitter }}</p></h5>
                                            @endif
                                            @if (isset($store->youtube))
                                                <h5 style="border: 1px solid gray;display: inline-block;padding: 10px 20px">@lang('frontend.youtube'): <p>{{ $store->youtube }}</p></h5>
                                            @endif
                                            @if (isset($store->google))
                                                <h5 style="border: 1px solid gray;display: inline-block;padding: 10px 20px">@lang('frontend.google'): <p>{{ $store->google }}</p></h5>
                                            @endif
                                            @if (isset($store->instagram))
                                                <h5 style="border: 1px solid gray;display: inline-block;padding: 10px 20px">@lang('frontend.instagram'): <p>{{ $store->instagram }}</p></h5>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="my-stock">
                                <div class="purchases-con">
                                    @if (count($products) > 0)
                                        <div class="profile-box row">
                                            <h4>@lang('frontend.products')</h4>
                                            @foreach ($products as $product)
                                            <div class="cart-item row" style="margin: 0">
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="cart-img text-center">
                                                        <img style="margin-top: 20px" src="{{ asset('pictures/products/' . $product->picture) }}" alt="img" />
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-md-9">
                                                    <div class="cart-con">
                                                        <h4>
                                                            {{ $product['name_'.$lang] }}
                                                            <br>
                                                        </h4>
                                                        <ul class="list-inline">
                                                            <li>
                                                                <form action="{{ route('deleteProduct', $product->id) }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                    <input style="border-radius: 0" type="submit" class="btn btn-danger" value="@lang('frontend.delete')">
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('editProductForm', $product->id) }}">@lang('frontend.edit')</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="alert alert-danger">@lang('frontend.no_products')</p>
                                    @endif
                                </div>
                            </div>
                            @if ($store->package->photos == 1)
                                <div class="tab-pane" id="my-pic">
                                    <div class="profile-box row">
                                        <h4>@lang('frontend.other_pics')</h4>
                                        @if (count($store->images) > 0)
                                            @foreach ($store->images as $image)
                                                <div class="col-md-3">
                                                    <div class="image-preview">
                                                        <a href="{{ asset('pictures/stores/' . $image->path) }}" data-fancybox="gallery">
                                                            <img src="{{ asset('pictures/stores/' . $image->path) }}" alt="{{ $store->name_ar }}" style="object-fit: cover; height: 170px;width: 100%;">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-md-12">
                                                <p class="alert alert-danger">@lang('frontend.no_photos')</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($store->package->reviews == 1)
                                <div class="tab-pane" id="reviews">
                                    <div class="profile-box row">
                                    <h4>@lang('frontend.wrire_review')</h4>
                                    <form action="{{ route('reviewSave', $store->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="@lang('frontend.your_name')" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="@lang('frontend.your_email')" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea name="text" rows="3" class="form-control" required placeholder="@lang('frontend.your_review')">{{ old('text') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div style="direction: ltr;text-align: center" class="col-md-12 gtg">
                                                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-size="xs">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input style="width: 100%;border-radius: 0" type="submit" value="@lang('frontend.add')" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <h4 style="margin-top: 15px;">@lang('frontend.reviews')</h4>
                                    @if (count($reviews) > 0)
                                        <ul class="list-unstyled">
                                            @foreach ($reviews as $review)
                                                <li style="border-bottom: 1px solid #ccc; padding: 10px 0;">
                                                    <span>{{ $review->name }}</span>
                                                    <p>{{ $review->text }}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="alert alert-danger">@lang('frontend.no_reviews')</p>
                                    @endif
                                </div>
                                </div>
                            @endif
                            @if ($store->package->branches == 1)
                                <div class="tab-pane" id="branches">
                                    <div class="profile-box row">
                                        <h4>@lang('frontend.branches')</h4>
                                    @if (count($store->branches) > 0)
                                        @foreach ($store->branches as $branche)
                                            <div class="my-address-con">
                                                <h4 style="margin-top: 0">{{ $branche->country->name_ar }} - {{ $branche->city }}
                                                    @if (isset(Auth::user()->id) && $store->user_id == Auth::user()->id)
                                                        <a href="{{ route('editBranchForm', $branche->id) }}" style="font-size: 12px; margin-right: 10px;"> @lang('frontend.edit') </a>
                                                        <form action="{{ route('deleteBranch', $branche->id) }}" method="post" style="display: inline-block">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <input type="submit" value="@lang('frontend.delete')" class="dd">
                                                        </form>
                                                    @endif
                                                </h4>
                                                <span>{{ $branche->details }}</span>
                                            </div>
                                        @endforeach
                                    @else
                                            <div class=" col-md-12">
                                                <p class="alert alert-danger">@lang('frontend.no_branches')</p>
                                            </div>
                                    @endif
                                    @if (isset(Auth::user()->id) && $store->user_id == Auth::user()->id)
                                        <div class="more-details col-md-12">
                                            <a style="border-radius: 0" href="{{ route('newBranch') }}" class="btn btn-primary"> @lang('frontend.new_branch')</a>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('frontend-footer')
    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: {{ $store->lat }},
                lng: {{ $store->lng }}
            },
            zoom: 15
        });
        var marker = new google.maps.Marker({
            map: map,
            position: {
                lat: {{ $store->lat }},
                lng: {{ $store->lng }}
            },
        });
        google.maps.event.addListener(marker, 'position_changed', function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    </script>
@endsection