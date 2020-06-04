@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">جميع العروض</div>

                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            <div class="table-responsive">
                                <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >
                                    <thead>
                                    <tr>
                                        <th style="width: 2%">ID</th>
                                        <th>الصورة</th>
                                        <th>الرابط</th>
                                        <th>العنوان</th>
                                        <th>خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($mainsliders as $mainslider)
                                        <tr class="odd gradeX">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td style="text-align: center"><img style="width: 250px;height: 100px;border-radius: 10px" src="{{ asset('pictures/mainslider/' .  $mainslider->image ) }}" alt="img" /></td>
                                            <td style="text-align: center"><a href="{{ $mainslider->link }}">{{ $mainslider->link }}</a></td>
                                            <td style="text-align: center">{{ mb_strimwidth($mainslider->title_ar , 0, 50, "...") }}</td>
                                            <td>
                                                <ul class="list-inline list-unstyled text-center">
                                                    <li>
                                                        <a href="{{ route('mainslider.edit', $mainslider->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="تعديل" style="padding: 8px 12px;"><i class="zmdi zmdi-edit"></i></a>
                                                    </li>
                                                    <li>
                                                        <form method="post" action="{{ route('mainslider.destroy', $mainslider->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-danger btn-sm confirm" data-toggle="tooltip" data-placement="top" title="حذف" style="padding: 8px 12px;"><i class="zmdi zmdi-delete"></i></button>
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

                </div>
            </div>
        </div>
    </div>
@endsection