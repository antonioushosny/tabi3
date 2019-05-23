@extends('layouts.index')


@section('content')

<section class="content-header">
    <h1>
    الأدوار
    <small>{{trans('admin.Control_panel')}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
        <li class="active"><a href="{{ route('roles.index') }}">  الأدوار</a></li>
    </ol>
</section>

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'success'] as $msg)
        @if(Session::has('alert-' . $msg))
        @section('script')
            <script>
                toastr.success('{{ Session::get('alert-' . $msg) }}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
            </script>
        @endsection
        <!--<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>-->
        @endif
    @endforeach
</div>
@if ($message = Session::get('success'))
        <!-- <p>{{ $message }}</p> -->
        @section('script')
            <script>
                toastr.success('{{ $message }}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
            </script>
        @endsection
@endif

<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-green">
            <div class="panel-heading">
                <section class="content-header" style=" !important;">
                    <div class="row" style="display:flex;">
                        <div class="col-md-8" >
                            <span style="font-size:2em ;"><i class="fa fa-cog"></i> إدارة الأدوار  </span>

                        </div>
                        <div class=" col-md-4">
                            <!-- <a href="#" class="add-modal btn btn-primary"><i class="fa fa-plus" ></i> {{trans('admin.add_order')}}</a>   -->
                            <!-- <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash" ></i> {{trans('admin.deleteall')}} </button> -->
                            
                            <a class="btn btn-success" href="{{ route('roles.create') }}"> أضافة دور جديد </a>
                            
                        </div>
                    </div>
                </section>
            </div>
            <div class="panel-body">
                <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <!-- <th><input type="checkbox" class="checkbox icheck" id="check-all" /></th> -->
                        <th>{{trans('admin.id')}}</th>
                        <th>{{trans('admin.name')}}</th>
                        <th>{{trans('admin.actions')}}</th>
                    </tr>
                    </thead>

                    <tbody id="adminstable">
                    @foreach ($roles as $key => $role)
                    @if($role->id != 1)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{$role->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">عرض</a>
                            @can('role_edit')
                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
                            @endcan
                            @can('role_delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>

                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
                
                </div>
            </div>
            </div>
        </div>
        <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>


@endsection