@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">رسائل الزوار</div>
                    <div class="panel-body">
                        @include('common.done')
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">الكل ({{ count($contacts) }})</a></li>
                                <li role="presentation"><a href="#read" aria-controls="read" role="tab" data-toggle="tab">المقروءة ({{ count($reads) }})</a></li>
                                <li role="presentation"><a href="#unread" aria-controls="unread" role="tab" data-toggle="tab">الغير مقروءة ({{ count($unreads) }})</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content" style="padding: 30px 0">
                                <div role="tabpanel" class="tab-pane active" id="all">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>البريد الالكتروني للمرسل</th>
                                                <th style="width: 30%">خيارات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr class="odd gradeX">
                                                    <td>{{ $contact->id }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>
                                                        <ul class="list-inline list-unstyled text-center">
                                                            <li>
                                                                <a data-toggle="modal" data-target="#more-{{ $contact->id }}" class="btn btn-sm btn-primary" style="padding: 7px 12px;"><i class="zmdi zmdi-eye"></i></a>
                                                            </li>

                                                            <div class="modal fade" id="more-{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body contact-model">
                                                                            <p>{{ $contact->description }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @if ($contact->seen !== 1)
                                                                <li>
                                                                    <a href="{{ route('adminContactRead', $contact->id) }}" class="btn btn-sm btn-success" style="padding: 7px 12px;"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a href="{{ route('adminContactUnRead', $contact->id) }}" class="btn btn-sm btn-success" style="padding: 7px 12px;"><i class="fa fa-remove"></i></a>
                                                                </li>
                                                            @endif
                                                            <li>
                                                                <a href="{{ route('contactReply', $contact->id) }}" class="btn btn-sm btn-warning" style="padding: 7px 12px;"><i class="zmdi zmdi-comment-edit"></i></a>
                                                            </li>
                                                            <li>
                                                                <form method="post" action="{{ route('adminContactDelete', $contact->id) }}">
                                                                    {{ csrf_field() }}
                                                                    <button class="btn btn-danger btn-sm confirm" style="padding: 7px 12px;"><i class="zmdi zmdi-delete"></i></button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end -->

                                <div role="tabpanel" class="tab-pane" id="read">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>البريد الالكتروني للمرسل</th>
                                                <th style="width: 30%">خيارات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($reads as $read)
                                                <tr class="odd gradeX">
                                                    <td>{{ $read->id }}</td>
                                                    <td>{{ $read->email }}</td>
                                                    <td>
                                                        <ul class="list-inline list-unstyled text-center">
                                                            <li>
                                                                <a data-toggle="modal" data-target="#read-{{ $read->id }}" class="btn btn-sm btn-primary" style="padding: 7px 12px;"><i class="zmdi zmdi-eye"></i></a>
                                                            </li>

                                                            <div class="modal fade" id="read-{{ $read->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body contact-model">
                                                                            <p>{{ $read->description }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <li>
                                                                <form method="post" action="{{ route('adminContactDelete', $read->id) }}">
                                                                    {{ csrf_field() }}
                                                                    <button class="btn btn-danger btn-sm confirm" style="padding: 7px 12px;"><i class="zmdi zmdi-delete"></i></button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end -->

                                <div role="tabpanel" class="tab-pane" id="unread">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>البريد الالكتروني للمرسل</th>
                                                <th style="width: 30%">خيارات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($unreads as $unread)
                                                <tr class="odd gradeX">
                                                    <td>{{ $unread->id }}</td>
                                                    <td>{{ $unread->email }}</td>
                                                    <td>
                                                        <ul class="list-inline list-unstyled text-center">
                                                            <li>
                                                                <a data-toggle="modal" data-target="#unread-{{ $unread->id }}" class="btn btn-sm btn-primary" style="padding: 7px 12px;"><i class="zmdi zmdi-eye"></i></a>
                                                            </li>

                                                            <div class="modal fade" id="unread-{{ $unread->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body contact-model">
                                                                            <p>{{ $unread->description }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <li>
                                                                <a href="{{ route('adminContactRead', $unread->id) }}" class="btn btn-sm btn-success" style="padding: 7px 12px;"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                            </li>

                                                            <li>
                                                                <a href="{{ route('contactReply', $unread->id) }}" class="btn btn-sm btn-warning" style="padding: 7px 12px;"><i class="zmdi zmdi-comment-edit"></i></a>
                                                            </li>

                                                            <li>
                                                                <form method="post" action="{{ route('adminContactDelete', $unread->id) }}">
                                                                    {{ csrf_field() }}
                                                                    <button class="btn btn-danger btn-sm confirm" style="padding: 7px 12px;"><i class="zmdi zmdi-delete"></i></button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection