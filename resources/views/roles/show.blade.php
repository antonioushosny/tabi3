@extends('layouts.index')


@section('content')

<section class="content-header">
    <h1>
        الادوار
    <small>{{trans('admin.Control_panel')}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
        <li class="active"><a href="{{ route('roles.index') }}">الأدوار</a></li>
        <li class="active"><a href="#">عرض الدور</a></li>
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
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
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
                            
                            <!-- <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('roles.index') }}"> رجوع</a>
                            </div>                        -->
                        </div>
                    </div>
                </section>
            </div>
            <div class="panel-body">
                <div class="box-body table-responsive">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>الاسم:</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>الصلاحيات:</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <label class="label label-success">{{ trans('role.'.$v->name )}},</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                
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






