<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'عناويني')
@section('frontend-main')

    <section class="security">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <br>
                    <div class="secur-con profile-box">
                        <h4>@lang('frontend.my_addresses')</h4>
                        @include('common.done')
                        @include('common.errors')
                        @if (count($addresses) > 0)
                            @foreach ($addresses as $address)
                                <div style="border-bottom: 1px solid lightgray" class="re-det">
                                    <div class="col-xs-6">
                                        <div class="add-det text-right">
                                            <p>{{ $address->city }} - {{ $address->district }} - {{ $address->street }}</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <ul class="list-inline text-left">
                                            @if ($address->default == 1)
                                                <li>@lang('frontend.deaf')</li>
                                            @endif
                                            <li><a href="{{ route('addressEditForm', $address->id) }}">@lang('frontend.edit')</a></li>
                                            @if ($address->default == 0)
                                                <li><a class="btn btn-success" href="{{ route('addressDefault', $address->id) }}">@lang('frontend.asDeaf')</a></li>
                                            @endif
                                            <li>
                                                <form action="{{ route('addressDelete', $address->id) }}" method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input style="border-radius: 0" class="btn btn-warning" type="submit" value="@lang('frontend.delete')" class="dd">
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            @endforeach
                        @else
                            <p>@lang('frontend.no_addresses')</p>
                        @endif
                        <br>

                        <div class="col-md-12 text-center">
                            <div class="re-link">
                                <a class="btn btn-success" href="{{ route('addressForm') }}">@lang('frontend.add_address')</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

