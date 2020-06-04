<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@if($lang == 'ar')
    @section('pageTitle', 'الباقات')
@else
    @section('pageTitle', 'Packages')
@endif
@section('frontend-main')
    <section class="packages" style="margin: 60px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($packages as $package)
                            <div class="col-xs-12 col-md-4">
                                <div class="panel panel-primary profile-box">
                                    @if (isset(Auth::user()->store->package_id) && Auth::user()->store->package_id == $package->id)
                                        <div class="cnrflash">
                                            <div class="cnrflash-inner">
                                                <span class="cnrflash-label">@lang('frontend.baqa')<br>@lang('frontend.current')</span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{ $package['name_'.$lang] }}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="the-price text-center">
                                            <h2>{{ $package->price }} {{ $riyal['name_'.$lang] }}<span class="subscript" style="font-size: 18px;">/@lang('frontend.monthly')</span></h2>
                                            <img src="{{ asset('pictures/packages/' . $package->picture) }}" alt="{{ $package->name_ar }}" style="margin: 30px 0">
                                        </div>
                                        <table class="table">
                                            <tr>
                                                <td>@lang('frontend.duration'): <span> {{ $package->days }} </span>@lang('frontend.day')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.products_no'):<span> {{ $package->products_namber }} </span>@lang('frontend.product')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.branches_no'):<span> {{ $package->branches }} </span>@lang('frontend.branch')</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.search_appear'):<span> @lang('frontend.first') </span>{{ $package->search_appearance }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.phone'):<span>
                                                    @if ($package->phone == 1)
                                                        <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                    @else
                                                        <i class="fa fa-remove" style="color: red;"></i>
                                                    @endif
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.mobile'):<span>
                                                    @if ($package->mobile == 1)
                                                            <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                        @else
                                                            <i class="fa fa-remove" style="color: red;"></i>
                                                        @endif
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.email'):<span>
                                                    @if ($package->email == 1)
                                                            <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                        @else
                                                            <i class="fa fa-remove" style="color: red;"></i>
                                                        @endif
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.website'):<span>
                                                    @if ($package->website == 1)
                                                            <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                        @else
                                                            <i class="fa fa-remove" style="color: red;"></i>
                                                        @endif
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.store_hours'):<span>
                                                    @if ($package->days_work == 1)
                                                            <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                        @else
                                                            <i class="fa fa-remove" style="color: red;"></i>
                                                        @endif
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.store_hours'):<span>
                                                    @if ($package->hours_work == 1)
                                                            <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                        @else
                                                            <i class="fa fa-remove" style="color: red;"></i>
                                                        @endif
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.store_stuff'):<span>
                                                    @if ($package->stuff_namber == 1)
                                                            <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                        @else
                                                            <i class="fa fa-remove" style="color: red;"></i>
                                                        @endif
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.location'):<span>
                                                    @if ($package->map == 1)
                                                            <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                        @else
                                                            <i class="fa fa-remove" style="color: red;"></i>
                                                        @endif
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.comments'):<span>
                                                    @if ($package->comments == 1)
                                                            <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                        @else
                                                            <i class="fa fa-remove" style="color: red;"></i>
                                                        @endif
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.reviews'):<span>
                                                    @if ($package->reviews == 1)
                                                            <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                        @else
                                                            <i class="fa fa-remove" style="color: red;"></i>
                                                        @endif
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.social'):<span>
                                                    @if ($package->social == 1)
                                                            <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                        @else
                                                            <i class="fa fa-remove" style="color: red;"></i>
                                                        @endif
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('frontend.several_photos'):<span>
                                                    @if ($package->photos == 1)
                                                            <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                        @else
                                                            <i class="fa fa-remove" style="color: red;"></i>
                                                        @endif
                                                    </span></td>
                                            </tr>
                                            <tr class="active">
                                                <td>
                                                    <p><?php $str = $package['description_'.$lang]; echo htmlspecialchars_decode($str); ?></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="{{ route('storeRegisterForm', $package->id) }}" class="btn btn-success" role="button">@lang('frontend.subscribe')</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection