@extends('layouts.index')
@section('style')
<link rel="stylesheet" href="{{ asset('rtl/plugins/iCheck/square/blue.css') }}">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script> -->

@endsection
 @section('content')
<!-- Main Content -->
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>{{__('admin.dashboard')}}
                <small>{{__('admin.Welcome to Khazan')}}</small>
                </h2>
            </div>            
                @if($lang =='ar')
                <div class="col-lg-7 col-md-7 col-sm-12 text-left">
                <ul class="breadcrumb float-md-left" style=" padding: 0.6rem; direction: ltr; ">
                @else 
                <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                @endif
                    <li class="breadcrumb-item active"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i>{{__('admin.dashboard')}}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="zmdi zmdi-accounts-add"></i> {{__('admin.reports')}}</a></li>
                </ul>
            </div>
        </div>
    </div>

     
    <div class="report-fluid">

            <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                       
        
                                <div class="header">
                                    <h2><strong>{{trans('admin.'.$title)}}</strong> {{trans('admin.add_center')}}  </h2>
                                    
                                </div>
                                <div class="body">
                                    {!! Form::open(['route'=>['storecenter'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ])!!} 
        
                                        <div class="row">
                                            <div class="col-md-6"> 
                                                @if(Auth::user()->role == 'admin' )
                                                    <!-- for provider_id -->
                                                    <div class= "form-group form-float">
                                                        {!! Form::select('provider_id',$providers
                                                            ,'',['class'=>'form-control show-tick select2' ,'placeholder' =>trans('admin.choose_provider'),'required']) !!}
                                                        <label id="provider_id-error" class="error" for="provider_id" style="">  </label>
                                                    </div>
                                                @elseif(Auth::user()->role == 'provider' )
                                                    <!-- for center_id -->
                                                    <div class= "form-group form-float">
                                                        {!! Form::select('center_id',$centers
                                                            ,'',['class'=>'form-control show-tick select2' ,'placeholder' =>trans('admin.choose_center'),'required']) !!}
                                                        <label id="center_id-error" class="error" for="center_id" style="">  </label>
                                                    </div>
                                                @else
                                                    <!-- for driver_id -->
                                                    <div class= "form-group form-float">
                                                        {!! Form::select('driver_id',$drivers
                                                            ,'',['class'=>'form-control show-tick select2' ,'placeholder' =>trans('admin.choose_driver'),'required']) !!}
                                                        <label id="driver_id-error" class="error" for="driver_id" style="">  </label>
                                                    </div>
                                               
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                    
                                            </div>
                                            <div class="col-md-6">  
                                                <!-- for city -->
                                                <div class= "form-group form-float">
                                                    {!! Form::select('city_id',$cities
                                                        ,'',['class'=>'form-control show-tick select2' ,'id'=>'city_id','placeholder' =>trans('admin.choose_city'),'required']) !!}
                                                    <label id="city_id-error" class="error" for="city_id" style="">  </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- for area -->
                                                <div class= "form-group form-float area_id_div ">
                                                    {!! Form::select('area_id',$areas
                                                        ,'',['class'=>'form-control show-tick select2' ,'id'=>'area_id','placeholder' =>trans('admin.choose_area'),'required']) !!}
                                                    <label id="area_id-error" class="error" for="area_id" style="">  </label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <!-- for status -->
                                                <div class= "form-group form-float area_id_div ">
                                                    {!! Form::select('status',$status
                                                        ,'',['class'=>'form-control show-tick select2' ,'id'=>'status','placeholder' =>trans('admin.choose_area'),'required']) !!}
                                                    <label id="status-error" class="error" for="status" style="">  </label>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">{{__('admin.search')}}</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                {{--  {!! Form::open(['route'=>['reportsdeleteall'],'method'=>'post','autocomplete'=>'off', 'id'=>'reportss_form' ])!!}  --}}

                        <div class="header">
                            <h2><strong>{{trans('admin.'.$title)}}</strong> </h2>
                            <ul class="header-dropdown">
        
                                {{--  <!-- </li>
                                    <a href="{{route('addreport')}}" class=" add-modal btn btn-success btn-round" title="{{trans('admin.add_report')}}">
                                        {{trans('admin.add_report')}}
                                    </a>
                                </li> -->  --}}
                                {{--  </li>
                                    <a href="javascript:void(0);" class=" deleteall-modal btn btn-danger btn-round" title="{{trans('admin.deleteall')}}">
                                        {{trans('admin.deleteall')}}
                                    </a>
                                </li>                                  --}}
                            </ul>
                        </div>
                        <div class="body">
                            @if($lang == 'ar')
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable-ar">
                            @else 
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            @endif
                                <thead>
                                    <tr>
                                        {{--  <th>
                                            <input type="checkbox" class="checkbox icheck" id="check-all" />
                                        </th>  --}}
                                        <th>{{trans('admin.user_name')}}</th>
                                        <th>{{trans('admin.usermobile')}}</th>
                                        <th>{{trans('admin.container_name')}}</th>
                                        <th>{{trans('admin.price')}}</th>
                                        <th>{{trans('admin.total')}}</th>
                                        <th>{{trans('admin.city')}}</th>
                                        <th>{{trans('admin.area')}}</th>
                                        <th>{{trans('admin.image')}}</th>
                                        <th>{{trans('admin.status')}}</th>
                                        <th>{{trans('admin.actions')}}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($reports as $data)
                                    <tr class="item{{$data->id}}">
                                        {{--  <td> 
                                            <input type="checkbox" name="ids[]" value={{$data->id}} class="check icheck">
                                        </td>  --}}
                                        <td>{{ $data->user_name }}</td>
                                        <td>{{ $data->user_mobile }}</td>
                                        <td>{{ $data->container_name_ar }}</td>     
                                        <td>{{ $data->price }}</td>     
                                        <td>{{ $data->total }}</td>     
                                        <td>{{ $data->city }}</td>     
                                        <td>{{ $data->area }}</td>     
                                             
                            
                                        @if($data->image)
                                            <td><img src="{{asset('img/').'/'.$data->image }}" width="50px" height="50px"></td>
                                        @else 
                                            <td><img src="{{asset('images/default.png') }}" width="50px" height="50px"></td>
                                        @endif

                                        @if($data->status == 'pending')
                                            <td style="text-align:report"><span  class="col-green">{{ trans('admin.pending')}}</span></td> 
                                        @else
                                            <td style="text-align:report"><span  class="col-red">{{ trans('admin.'.$data->status)}}</span></td> 
                                        @endif
                                        <td>
                                            {{--  <!-- <a href="{{route('editreport',$data->id)}}" class="btn btn-info waves-effect waves-float waves-green btn-round " title="{{trans('admin.edit')}}"><i class="zmdi zmdi-edit"></i></a> -->  --}}

                                            {{--  <a href="javascript:void(0);" class=" delete-modal btn btn-danger waves-effect waves-float waves-red btn-round " title="{{trans('admin.delete')}}" data-id="{{$data->id}}" ><i class="zmdi zmdi-delete"></i></a>  --}}
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    {{--  </form>  --}}
                </div>
            </div>
        </div>
  
    </div>
</section>
  
@endsection 

@section('script')

<script src="{{ asset('rtl/plugins/iCheck/icheck.min.js') }}"></script> 

<script>

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
        
    $('#check-all').on('ifChecked', function(event) {
        $('.check').iCheck('check');

    });
    $('#check-all').on('ifUnchecked', function(event) {
        $('.check').iCheck('uncheck');
        
    });
    // Removed the checked state from "All" if any checkbox is unchecked
    $('#check-all').on('ifChanged', function(event){
        if(!this.changed) {
            this.changed=true;
            $('#check-all').iCheck('check');
        
        } else {
            this.changed=false;
            $('#check-all').iCheck('uncheck');
    
        }
        $('#check-all').iCheck('update');
    });
    //this for delete
    $(document).on('click', '.delete-modal', function() {

        titlet ="{{__('admin.alert_title')}}" ;
        textt ="{{__('admin.alert_text')}}" ;
        typet ="{{__('admin.warning')}}" ;
        confirmButtonTextt ="{{__('admin.confirmButtonText')}}" ;
        cancelButtonTextt ="{{__('admin.cancelButtonText')}}" ;
        Deleted ="{{__('admin.Deleted!')}}" ;
        has_been_deleted = "{{__('admin.has_been_deleted')}}" ;
        success ="{{__('admin.success')}}" ;
        Cancelled ="{{__('admin.Cancelled')}}" ;
        file_is_safe ="{{__('admin.file_is_safe')}}" ;
        no_elemnet_selected ="{{__('admin.no_elemnet_selected')}}" ;
        error ="{{__('admin.error')}}" ;
        id = $(this).data('id') ;
        swal({
            title: titlet,
            text: textt,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: confirmButtonTextt,
            cancelButtonText: cancelButtonTextt,
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo url('/')?>/reports/delete/" + id,
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function(data) {
                        $('.item' + data['id']).remove();
                        swal(Deleted, has_been_deleted, "success");
                    }
                });
            } else {
                swal(Cancelled, file_is_safe, "error");
            }
        });
        // $('#deleteModal').modal('show');
        // id = $('#id_delete').val();
    });
    //this for delete all selected
    $(document).on('click', '.deleteall-modal', function() {

        titlet ="{{__('admin.alert_title')}}" ;
        textt ="{{__('admin.alert_text')}}" ;
        typet ="{{__('admin.warning')}}" ;
        confirmButtonTextt ="{{__('admin.confirmButtonText')}}" ;
        cancelButtonTextt ="{{__('admin.cancelButtonText')}}" ;
        Deleted ="{{__('admin.Deleted!')}}" ;
        has_been_deleted = "{{__('admin.has_been_deleted')}}" ;
        success ="{{__('admin.success')}}" ;
        Cancelled ="{{__('admin.Cancelled')}}" ;
        file_is_safe ="{{__('admin.file_is_safe')}}" ;
        no_elemnet_selected ="{{__('admin.no_elemnet_selected')}}" ;
        error ="{{__('admin.error')}}" ;
        swal({
            title: titlet,
            text: textt,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: confirmButtonTextt,
            cancelButtonText: cancelButtonTextt,
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                var choices = [];
                checkboxes = document.getElementsByName('ids[]');
                for (var i=0;i<checkboxes.length;i++){
                    if ( checkboxes[i].checked ) {
                    choices.push(checkboxes[i].value);
                    }
                }
                if(choices.length >= 1){
                    var form = $(this);
                    $.ajax({
                        type: 'POST',
                        url: '{{ URL::route("usersdeleteall") }}',
                        data:  new FormData($("#reportss_form")[0]),
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            for (var i=0;i<data.length;i++){
                                $('.item' + data[i]).remove();
                            }
                            swal(Deleted, has_been_deleted, "success");
                        },
                    });
                }
                else{
                    swal(Cancelled, no_elemnet_selected, "error");
                }

            } else {
                swal(Cancelled, file_is_safe, "error");
            }
        });
        // $('#deleteModal').modal('show');
        // id = $('#id_delete').val();
    });
    
</script>
    
@endsection
