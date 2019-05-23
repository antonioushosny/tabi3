@extends('layouts.index')


@section('content')

<section class="content-header">
    <h1>
        الأدوار
    <small>{{trans('admin.Control_panel')}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
        <li class="active"><a href="{{ route('roles.index') }}">الأدوار</a></li>
        <li class="active"><a href="#">اضافة دور</a></li>
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
                            <!-- @can('role_create')
                            <a class="btn btn-success" href="{{ route('roles.create') }}"> أضافة دور جديد </a>
                            @endcan -->
                        </div>
                    </div>
                </section>
            </div>
            <div class="panel-body">
                <div class="box-body table-responsive">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>اسم الدور:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'ادخل اسم الدور','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>الصلاحيات:</strong>
                            <br/>
                            <?php $i = 0 ?> 
                            <div class="row">
                            @foreach($permission as $value)
                               
                                @if($i%4 == 0)
                                <br/>
                                @endif
                                <div class="col-md-3">
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{  trans('role.'.$value->name) }}</label>
                                </div>
                                <?php $i++ ; ?>
                            @endforeach
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </div>
                {!! Form::close() !!}
                
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








