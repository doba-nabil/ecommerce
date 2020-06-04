<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'اتمام الطلب')
@section('frontend-main')

    <section class="cart-det-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6">

                    <div class="cart-tab">
                        <!-- Nav tabs -->
                        <ul class="list-inline cart-links">
                            <li>
                                <a href="#" class="active">Cart</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Information</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">shipping </a>
                            </li>
                            <li>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Payment </a>
                            </li>

                        </ul>

                        <!-- Tab panes -->


                        <div class="tab-content">

                            <div class="cart-info1">
                                <h4>@lang('frontend.contact11')</h4>
                                <div class="cart-image">
                                    <img src="{{ asset('pictures/avatars/' .  Auth::user()->picture) }}" alt="img" />
                                    <h4>
                                        <span>{{ Auth::user()->name }}</span>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            @lang('frontend.logout')
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </h4>
                                </div>
                            </div>
                            <div class="cart-info11">
                                <div class="col-xs-12">
                                    <h4>@lang('frontend.shipTo')</h4>
                                    @if (count($dafaultAdress) > 0)
                                        <h5>{{ $dafaultAdress->country['name_'.$lang] }}</h5>
                                        <h5>{{ $dafaultAdress->city }}</h5>
                                        <h5>{{ $dafaultAdress->district }} {{ $dafaultAdress->street }}</h5>
                                        <h5>{{ $dafaultAdress->details }}</h5>
                                        @if (isset(Auth::user()->phone))
                                            <h5>@lang('frontend.phone') : {{ Auth::user()->phone }}</h5>
                                        @endif
                                        <div class="edit-link text-left">
                                            <a href="{{ route('addressEditForm', $dafaultAdress->id) }}">
                                                @lang('frontend.edit')
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </div>
                                    @else
                                        <h5>@lang('frontend.add_address1')</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <ul class="list-inline">
                                    <li class="follow">
                                        <a href="#" data-toggle="modal" data-target="#add-address">@lang('frontend.add_address')</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade profile-box" id="add-address" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h4 style="color: white" class="modal-title" id="myModalLabel">@lang('frontend.add_address')</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('addressSave') }}" method="post" enctype="multipart/form-data" class="charge-add1">
                                                {{ csrf_field() }}
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="country_id" id="country_id" class="form-control select">
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}">{{ $country['name_'.$lang] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="city" id="city" value="{{ old('city') }}" required placeholder="@lang('frontend.city')" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="district" id="district" value="{{ old('district') }}" required placeholder="@lang('frontend.district')" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="street" id="street" value="{{ old('street') }}" required placeholder="@lang('frontend.street')" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" name="details" id="details" value="{{ old('details') }}" required placeholder="@lang('frontend.house_details')" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <textarea name="notes" id="notes" cols="30" rows="6" class="form-control" placeholder="@lang('frontend.notes')">{{ old('notes') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="default" value="1">@lang('frontend.use_address')
                                                            </label>
                                                        </div>
                                                        <button style="width: 100%;border-radius: 0" type="submit" class="btn btn-primary">@lang('frontend.add')</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>

                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="clearfix"></div>
                    <div class="cart-products">
                        @foreach (Cart::content() as $item)
                        <div style="border-bottom: 1px solid #d6d6d6" class="cart-box1">
                            <div class="col-md-8">
                                <div class="c-pro-img">
                                    <img src="{{ asset('pictures/products/' . $item->model->picture) }}" alt="img" />
                                    <span>
                                        <a href="{{ route('single', $item->model->id) }}">{{ mb_strimwidth($item->model['name_'.$lang] , 0, 40, "...") }}</a>
                                        <br>
                                        <p>@lang('frontend.code'): {{ $item->model->code }}</p>
                                    </span>
                                    <h5>
                                        <br>
                                        <span>@lang('frontend.qty1'):</span>
                                        <span>
                                        <?php
                                            $i = 0;
                                            foreach (Cart::content() as $qty) {
                                                $i+= $qty->qty;
                                            }
                                            echo  $i;
                                            ?>
                                    </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-pro-con text-right">
                                    <span>@if (isset($item->model->discount))
                                            <p>{{ $item->model->discount }} {{ $item->model->currency['name_'.$lang] }}</p>
                                            <p style="text-decoration: line-through;">{{ $item->model->price }} {{ $item->model->currency['name_'.$lang] }} </p>
                                            <p>
                                         <span>@lang('frontend.discount1')
                                             <?php
                                             $offerRate = $item->model->discount/$item->model->price*100;
                                             $offerRate = 100 - $offerRate;
                                             echo round($offerRate) . '%';
                                             ?>
                                    </span>
                                        </p>
                                        @else
                                            <p>{{ $item->model->price }} {{ $item->model->currency['name_'.$lang] }}</p>

                                        @endif</span>
                                </div>
                                <br>
                                <form action="{{ route('removeItem', $item->rowId) }}" method="post">
                                    {{ csrf_field() }}
                                    <button class="no-btn"><i class="fa fa-trash">  @lang('frontend.delete')  </i></button>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                        </div>
                            <br>
                        @endforeach
                        <div class="clearfix"></div>
                        <div class="cart-box2">
                            <h4>
                                <span>@lang('frontend.shippingRate'):</span>
                                <span>{{ $shipping_rate }} {{ $currentLanguage['name_'.$lang] }}</span>
                            </h4>
                        </div>
                        <div class="cart-box3">
                            <h4>
                                <span>@lang('frontend.total'):</span>
                                <span>{{ $my_total }} {{ $currentLanguage['name_'.$lang] }}</span>
                                <br>
                            </h4>
                        </div>

                            @if (count($dafaultAdress) > 0)
                                <ul class="list-inline">
                                    <li class="follow">
                                        <a href="{{ route('checkoutConfirmation') }}">@lang('frontend.go2Payment')</a>
                                    </li>
                                </ul>
                            @endif
                            <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('frontend-footer')

@endsection

