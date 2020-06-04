<?php
$lang = App::getLocale();
?>
@extends('frontend.layout.master')
@section('pageTitle', $page['title_'.$lang ])
@section('backend-head')
    <style>
        .panel-heading{
            color: #fff!important;
            background-color: #19befe!important;

        }
        .panel-body h4{
            font-family: auto;
        }
    </style>
@endsection
@section('frontend-main')
    <section class="who" style="margin: 70px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $page['title_' . $lang] }}</h3>
                        </div>
                        <div class="panel-body">
                            <p><?php $str = $page['description_' . $lang]; echo htmlspecialchars_decode($str); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection