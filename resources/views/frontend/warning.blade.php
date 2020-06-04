@extends('frontend.layout.master')
@section('pageTitle', 'تحذير')
@section('frontend-main')
    <section style="margin: 60px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('frontend.warning')</h3>
                        </div>
                        <div class="panel-body">
                            @if (session()->has('warning'))
                                <p class="alert alert-warning">{{ session()->get('warning') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection