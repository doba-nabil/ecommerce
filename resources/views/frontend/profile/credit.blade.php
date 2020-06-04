@extends('frontend.layout.master')
@section('pageTitle', 'رصيدي')
@section('frontend-main')
    <section style="margin: 70px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('frontend.my_credit')</h3>
                        </div>
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            @if (Auth::user()->credit > 0)
                                <p class="alert alert-success">@lang('frontend.no_trans_to_credit') {{ Auth::user()->credit }} @lang('frontend.RS')</p>
                                <a href="{{ route('addCredit') }}" class="btn btn-primary pull-left">@lang('frontend.credit1')</a>
                            @else
                                <p class="alert-danger alert">@lang('frontend.credit2') <a href="{{ route('addCredit') }}">@lang('frontend.from_here')</a>!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection