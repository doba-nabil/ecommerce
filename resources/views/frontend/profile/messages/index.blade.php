@extends('frontend.layout.master')
@section('pageTitle', 'الرسائل')
@section('frontend-main')
    <section class="inbox" style="margin: 70px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="profile-box">
                        <div class="panel-heading profile-box">
                            <h4 class="panel-title">@lang('frontend.your_messages')</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('common.done')
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#reciving" aria-controls="reciving" role="tab" data-toggle="tab">@lang('frontend.inbox')</a></li>
                                            <li role="presentation"><a href="#sending" aria-controls="sending" role="tab" data-toggle="tab">@lang('frontend.sent')</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="reciving">
                                                <table class="text-center">
                                                    <thead>
                                                    <tr>
                                                        <td>@lang('frontend.title')</td>
                                                        <td>@lang('frontend.from')</td>
                                                        <td>@lang('frontend.date')</td>
                                                        <td>@lang('frontend.options')</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if (count($recived_msgs) > 0)
                                                        @foreach ($recived_msgs as $recived_msg)
                                                            <tr>
                                                                <td>{{ $recived_msg->title }}</td>
                                                                <td><a href="{{ route('profile', $recived_msg->from->id) }}" style="color: #4090D2">{{ $recived_msg->from->name }}</a></td>
                                                                <td>
                                                                    <?php \Carbon\Carbon::setLocale('ar'); ?>
                                                                    {{ $recived_msg->created_at->diffForHumans() }}
                                                                </td>
                                                                <td>
                                                                    <ul class="list-inline list-unstyled text-center">
                                                                        <li>
                                                                            <a data-toggle="modal" data-target="#show-{{ $recived_msg->id }}" class="btn btn-sm btn-primary">@lang('frontend.show')</a>
                                                                        </li>
                                                                        <div class="modal fade" id="show-{{ $recived_msg->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                        <h4 class="modal-title" id="myModalLabel">{{ $recived_msg->title }}</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        {{ $recived_msg->body }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <li>
                                                                            <a href="{{ route('replyMessages', $recived_msg->from->id) }}" class="btn btn-sm btn-success ">@lang('frontend.reply')</a>
                                                                        </li>
                                                                        <li>
                                                                            <form method="post" action="{{ route('toDeleteMessage', $recived_msg->id) }}">
                                                                                {{ csrf_field() }}
                                                                                <button class="btn btn-danger btn-sm confirm">@lang('frontend.delete')</button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4">@lang('frontend.no_msgs')</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end -->

                                            <div role="tabpanel" class="tab-pane" id="sending">
                                                <table class="text-center">
                                                    <thead>
                                                    <tr>
                                                        <td>@lang('frontend.title')</td>
                                                        <td>@lang('frontend.to')</td>
                                                        <td>@lang('frontend.date')</td>
                                                        <td>@lang('frontend.options')</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if (count($sent_msgs) > 0)
                                                        @foreach ($sent_msgs as $sent_msg)
                                                            <tr>
                                                                <td>{{ $sent_msg->title }}</td>
                                                                <td><a href="{{ route('profile', $sent_msg->to->id) }}" style="color: #4090D2">{{ $sent_msg->to->name }}</a></td>
                                                                <td>
                                                                    <?php \Carbon\Carbon::setLocale('ar'); ?>
                                                                    {{ $sent_msg->created_at->diffForHumans() }}
                                                                </td>
                                                                <td style="width: 34%">
                                                                    <ul class="list-inline list-unstyled text-center">
                                                                        <li>
                                                                            <a data-toggle="modal" data-target="#show-{{ $sent_msg->id }}" class="btn btn-sm btn-primary">@lang('frontend.show')</a>
                                                                        </li>
                                                                        <div class="modal fade" id="show-{{ $sent_msg->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                        <h4 class="modal-title" id="myModalLabel">{{ $sent_msg->title }}</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        {{ $sent_msg->body }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <li>
                                                                            <form method="post" action="{{ route('fromDeleteMessage', $sent_msg->id) }}">
                                                                                {{ csrf_field() }}
                                                                                <button class="btn btn-danger btn-sm confirm">@lang('frontend.delete')</button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4">@lang('frontend.no_msgs')</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
