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
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="zmdi zmdi-accounts-add"></i> {{__('admin.centers')}}</a></li>
                </ul>
            </div>
        </div>
    </div>

     
    <div class="center-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                {!! Form::open(['route'=>['centersdeleteall'],'method'=>'post','autocomplete'=>'off', 'id'=>'centerss_form' ])!!}

                        <div class="header">
                            <h2><strong>{{trans('admin.'.$title)}}</strong> </h2>
                            <ul class="header-dropdown">
        
                                </li>
                                    <a href="{{route('addcenter')}}" class=" add-modal btn btn-success btn-round" title="{{trans('admin.add_center')}}">
                                        {{trans('admin.add_center')}}
                                    </a>
                                </li>
                                </li>
                                    <a href="javascript:void(0);" class=" deleteall-modal btn btn-danger btn-round" title="{{trans('admin.deleteall')}}">
                                        {{trans('admin.deleteall')}}
                                    </a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="body">
                        <div class="table-responsive">
                            @if($lang == 'ar')
                                <table class="table table-bordered  table-striped table-hover dataTable js-exportable-ar">
                            @else 
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            @endif
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" class="checkbox icheck" id="check-all" />
                                        </th>
                                        <th>{{trans('admin.provider')}}</th>
                                        <th>{{trans('admin.responsible_name')}}</th>
                                        <th>{{trans('admin.email')}}</th>
                                        <th>{{trans('admin.mobile')}}</th>
                                        <th>{{trans('admin.city')}}</th>
                                        <th>{{trans('admin.area')}}</th>
                                        <th>{{trans('admin.logo')}}</th>
                                        <th>{{trans('admin.status')}}</th>
                                        <th>{{trans('admin.actions')}}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($centers as $data)
                                    <tr class="item{{$data->id}}">
                                        <td> 
                                            <input type="checkbox" name="ids[]" value={{$data->id}} class="check icheck">
                                        </td>
                                        <td>{{ $data->provider->name }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>          
                                        <td>{{ $data->mobile }}</td>    
                                        @if($data->City)
                                            @if($lang == 'ar')
                                                <td>{{ $data->City->name_ar }}</td>  
                                            @else
                                                <td>{{ $data->City->name_en }}</td>  
                                            @endif
                                        @else
                                            <td> </td>  
                                        @endif  

                                        @if($data->Area)
                                            @if($lang == 'ar')
                                                <td>{{ $data->Area->name_ar }}</td>  
                                            @else
                                                <td>{{ $data->Area->name_en }}</td>  
                                            @endif
                                        @else
                                            <td> </td>  
                                        @endif 
                                        @if($data->image)
                                            <td><img src="{{asset('img/').'/'.$data->image }}" width="50px" height="50px"></td>
                                        @else 
                                            <td><img src="{{asset('images/default.png') }}" width="50px" height="50px"></td>
                                        @endif
                                        @if($data->status == 'active')
                                            <td style="text-align:center"><span  class="col-green">{{ trans('admin.active')}}</span></td> 
                                        @elseif($data->status == 'not_active')
                                            <td style="text-align:center"><span  class="col-red">{{ trans('admin.not_active')}}</span></td> 
                                        @endif
                                        <td>
                                            <a href="{{route('editcenter',$data->id)}}" class="btn btn-info waves-effect waves-float waves-green btn-round " title="{{trans('admin.edit')}}"><i class="zmdi zmdi-edit"></i></a>

                                            <a href="javascript:void(0);" class=" delete-modal btn btn-danger waves-effect waves-float waves-red btn-round " title="{{trans('admin.delete')}}" data-id="{{$data->id}}" ><i class="zmdi zmdi-delete"></i></a>
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </form>
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

        // $('.modal-title').text('{{trans('admin.delete')}}');
        // $('#id_delete').val($(this).data('id'));
        id = $(this).data('id') ;
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo url('/')?>/centers/delete/" + id,
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function(data) {
                        $('.item' + data['id']).remove();
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    }
                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
        // $('#deleteModal').modal('show');
        // id = $('#id_delete').val();
    });
    //this for delete all selected
    $(document).on('click', '.deleteall-modal', function() {

        // $('.modal-title').text('{{trans('admin.delete')}}');
        // $('#id_delete').val($(this).data('id'));
        // id = $(this).data('id') ;
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
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
                        url: '{{ URL::route("centersdeleteall") }}',
                        data:  new FormData($("#centerss_form")[0]),
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            for (var i=0;i<data.length;i++){
                                $('.item' + data[i]).remove();
                            }
                            swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        },
                    });
                }
                else{
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }

            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
        // $('#deleteModal').modal('show');
        // id = $('#id_delete').val();
    });
    
</script>
    
@endsection
