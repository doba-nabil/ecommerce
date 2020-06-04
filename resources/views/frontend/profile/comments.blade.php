<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'أخر التعليقات')
@section('frontend-main')
    <section class="security">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="fav-con">
                        <h4>أخر تعليقات العضو "{{ $user->full_name ?? $user->name }}" ({{ count($comments) }})</h4>
                        @include('common.done')
                        @include('common.errors')
                        @if (count($comments) > 0)
                            @foreach ($comments as $comment)
                                <ul class="list-unstyled listComments">
{{--                                    <li>{{ $comment->comment }} على <a href="{{ route('single', $comment->product->id) }}">{{ $comment->product['name_'.$lang] }}</a></li>--}}
                                    <li>
                                        <p>{{ $comment->comment }}</p>
                                        <span>المنتج: <a href="{{ route('single', $comment->product->id) }}">{{ $comment->product['name_'.$lang] }}</a></span>
                                        <br><span>التاريخ: {{ $comment->created_at->toDateString() }}</span>
                                    </li>
                                </ul>
                            @endforeach
                        @else
                            <p>لا توجد تعليقات حاليا!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

