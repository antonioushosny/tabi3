@extends('layouts.index')

@section('content')
   <section class="content-header">
       <h1>
           {{trans('admin.contacts')}}
       <small>{{trans('admin.Control_panel')}}</small>
       </h1>
       <ol class="breadcrumb">
         <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
         <li class="active"><a href="#">{{trans('admin.contacts')}}</a></li>
       </ol>
   </section>

   <div class="flash-message">
       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
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
   
   <!-- Main content -->
    <?php $msg = trans('admin.confirm_delete') ; ?> 
     {!! Form::open(['route'=>['contactdeleteall'],'method'=>'post','autocomplete'=>'off', 'id'=>'contactss_form' , 'onsubmit'=> "return confirm('$msg');"])!!}
   <section class="content">
       <div class="row">
           <div class="col-xs-12">
             <div class="box">
               <div class="panel panel-green">
                 <div class="panel-heading">
                
                   <section class="content-header" style=" !important;">
                       <div class="row" style="display:flex;">
                           <div class="col-md-8" >
                               <span style="font-size:2em ;"><i class="fa fa-cog"></i> {{trans('admin.'.$title)}}</span>

                           </div>
                           <div class=" col-md-4">
                               {{--  <a href="#" class="add-modal btn btn-primary"><i class="fa fa-plus" ></i> {{trans('admin.add_contact')}}</a>  
                               <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash" ></i> {{trans('admin.deleteall')}} </button>  --}}
                               
                           </div>
                       </div>
       
                   </section>

                 </div>
                 <div class="panel-body">
                   <div class="box-body table-responsive">
                     <table id="example1" class="table table-bordered table-striped table-hover">
                       <thead>
                         <tr>
                              
                           {{--  <th><input type="checkbox" class="checkbox icheck" id="check-all" /></th>  --}}
                           <th>{{trans('admin.name')}}</th>
                           <th>{{trans('admin.email')}}</th>
                           <th>{{trans('admin.title')}}</th>
                           <th>{{trans('admin.message')}}</th>
                           <th>{{trans('admin.status')}}</th>
                           <th>{{trans('admin.actions')}}</th>
                         </tr>
                       </thead>

                       <tbody id="contacttable">
                           @foreach ($contacts as $data)
                             <tr class="item{{$data->id}}">
                               {{--  <td><input type="checkbox" name="ids[]" value={{$data->id}} class="check icheck"></td>  --}}
                               <td>{{ $data->name }}</td>
                               <td>{{ $data->email }}</td>
                               <td>{{ $data->title }}</td>
                               <td>{{ $data->message }}</td>
                               <td>{{ trans('admin.'.$data->status) }}</td>

                                <td>

                                <a href="#" class=" delete-modal btn btn-danger btn-round" title="{{trans('admin.delete')}}" data-id="{{$data->id}}" >
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                              
                                <a href="#" class=" edit-modal btn btn-warning btn-round" title="{{trans('admin.edit')}}" data-data="{{$data}}" >
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                               </td>  
             
                             </tr>
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
</form>
        <div id="fade"></div>
        <div id="modal" style="z-index:30000">
            <img id="loader" src="{{asset('images/loading.gif')}}" />
        </div>
       <!--modal for delete -->
       <div id="deleteModal" class="modal fade" role="dialog">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">×</button>
                       {{--  <h4 class="modal-title"></h4>  --}}
                        <div class="panel-heading " style="text-align: center"> <h4>{{trans('admin.delete_contact')}}</h4>
                       </div>  
                   </div>
                   <div class="modal-body">
                       <h3 class="text-center">{{trans('admin.confirm_delete')}}</h3>
                       <br />
                       <form class="form-horizontal" role="form">
                           <div class="form-group">
                               <div class="col-sm-10">
                                   <input type="hidden" class="form-control" id="id_delete" disabled>
                               </div>
                           </div>
                       </form>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                               <span id="" class='glyphicon glyphicon-trash'></span> {{trans('admin.delete')}} 
                           </button>
                           <button type="button" class="btn btn-warning" data-dismiss="modal">
                               <span class='glyphicon glyphicon-remove'></span> {{trans('admin.Close')}} 
                           </button>
                       </div>
                   </div>
               </div>
           </div>
       </div>
        <!--modal for edit -->
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="  width: 50%; ">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="panel-group">
                            
                            {!! Form::open(['route'=>['editcontact'],'method'=>'post','autocomplete'=>'off','role'=>'form','id'=>'formeditcontacts'])!!}
                            {!! Form::hidden('id','',['class'=>'form-control foridedit','id' => 'id_edit'] ) !!}
                            <div class="panel panel-green">
                                <div class="panel-heading " style="text-align: center"> 
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4>{{trans('admin.edit_contact')}}</h4>
                                </div>
                                <div class="panel-body">

                                        {{--  for status   --}}
                                    <div class="row"  style="display:flex;">
                                        <div class= "col-md-12 col-xs-12">
                                            <div class="form-group  row" style="display:flex;">
                                                <div class="col-xs-3">
                                                    <span style="color: black "> *
                                                        {!! Form::label('status',trans('admin.status')) !!}
                                                    </span>
                                                </div>
                                                <div class="col-xs-9">
                                                    <span style="color: black "> 
                                                        {!! Form::select('status',['new'=>trans('admin.new'),'solved'=>trans('admin.solved'),'not_resolved'=>trans('admin.not_resolved')]
                                                            ,'',['class'=>'form-control' ,'id' => 'status_edit' ,'placeholder' =>trans('admin.choose')]) !!}
                                                    </span>
                                                    <span style="color: red " class="status1 text-center hidden"></span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-primary edit " >
                                        <span class='glyphicon glyphicon-check'></span> {{trans('admin.edit')}}
                                    </button>

                                        {!! Form::close()!!}
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span class='glyphicon glyphicon-remove'></span> {{trans('admin.Close')}} 
                                    </button>
                                    
                                </div>
                            </div>
                        </div>           
                    </div>
                </div>
            </div>
        </div>
  
@endsection 
@section('style')
   <style>
           
   </style>  
 
@endsection

@section('script1')

  
 <script>
        function openModal() {
            document.getElementById('modal').style.display = 'block';
            document.getElementById('fade').style.display = 'block';
        }
    
        function closeModal() {
            document.getElementById('modal').style.display = 'none';
            document.getElementById('fade').style.display = 'none';
        }
     jQuery(function($){
       $(document).on('click', '.delete-modal', function() {
           console.log ();
         $('.modal-title').text('{{trans('admin.delete')}}');
         $('#id_delete').val($(this).data('id'));
         $('#deleteModal').modal('show');
         id = $('#id_delete').val();
       });
        $(document).on('click', '.edit-modal', function() {
            data = $(this).data('data');
            // console.log(data);
            $('.modal-title').text('{{trans('admin.edit')}}');
            $('#id_edit').val(data.id);
            $('#status_edit').val(data.status);
            id = $('#id_edit').val();
            status = data.status ;
            $('.status1').addClass('hidden');
            $('#editModal').modal('show');
        });

       // this for delete record
       $('.modal-footer').on('click', '.delete', function() {
        openModal();
         $.ajax({
             type: 'GET',
             url: "<?php echo url('/')?>/home/contacts/delete/" + id,
             data: {
                 '_token': $('input[name=_token]').val(),
             },
             success: function(data) {
                closeModal();
                 toastr.success('{{trans('admin.successfully_deleted')}}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
                 $('.item' + data['id']).remove();
             }
         });
       });
    });
     // this for edit record
    $('#formeditcontacts').submit(function(e) {
        //  $('#editModal').modal('hide');  
        {{--  alert('done');  --}}
        e.preventDefault();
            openModal();
        var form = $(this);
        id =  $('.foridedit').val();  
        $.ajax({
            type: 'POST',
            url:'{{ URL::route("editcontact") }}',
            data: new FormData($("#formeditcontacts")[0]),
            processData: false,
            contentType: false,
            success: function(data) {
                $('.status1').addClass('hidden');                   

                if ((data.errors)) {
                    closeModal();
                    toastr.error('{{trans('admin.Validation_error')}}', '{{trans('admin.Error_Alert')}}', {timeOut: 5000});

                    if (data.errors.status) {
                        $('.status1').removeClass('hidden');
                        $('.status1').text(data.errors.status);
                    }

                    
                } else {
                    location.reload();
                    // var y = JSON.stringify(data);
                    // if(data.status != status){
                    //     $('.item' + data.id).remove();
                    // }
                    // toastr.success('{{trans('admin.successfully_edited')}}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
                    // closeModal();
                    // $('#formeditcontacts')[0].reset();
                    // $('#editModal').modal('hide');
                }
            }
        });
    });
     function isNumber(e){
           var key = e.charCode;  
           if( key <48 || key >57 )
           {
               if (key != 0)
               {
               e.preventDefault();   
               }
                         
           }
       }
       
 </script>
@endsection