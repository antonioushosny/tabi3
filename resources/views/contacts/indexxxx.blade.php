@extends('layouts.index')

@section('content')
   <section class="content-header">
       <h1>
           {{trans('admin.contacts')}}
       <small>{{trans('admin.Control_panel')}}</small>
       </h1>
       <ol class="breadcrumb">
         <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
         <li class="active"><a href="{{ route('contacts') }}">{{trans('admin.contacts')}}</a></li>
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
     {!! Form::open(['route'=>['contactdeleteall'],'method'=>'post','autocomplete'=>'off', 'id'=>'contactss_form' ])!!}
   <section class="content">
       <div class="row">
           <div class="col-xs-12">
             <div class="box">
               <div class="panel panel-green">
                 <div class="panel-heading">
                
                   <section class="content-header" style=" !important;">
                       <div class="row" style="display:flex;">
                           <div class="col-md-8" >
                               <span style="font-size:2em ;"><i class="fa fa-cog"></i> {{trans('admin.contacts')}}</span>

                           </div>
                           <div class=" col-md-4">
                               {{--  <a href="#" class="add-modal btn btn-primary"><i class="fa fa-plus" ></i> {{trans('admin.add_contact')}}</a> --}} 
                               @can('contacts-delete')
                               <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash" ></i> {{trans('admin.deleteall')}} </button>  
                               @endcan
                               
                           </div>
                       </div>
       
                   </section>

                 </div>
                 <div class="panel-body">
                   <div class="box-body table-responsive">
                     <table id="example2" class="table table-bordered table-striped table-hover">
                       <thead>
                         <tr>
                              
                           <th><input type="checkbox" class="checkbox icheck" id="check-all" /></th>
                           <th>{{trans('admin.name')}}</th>
                           <th>{{trans('admin.email')}}</th>
                           <th>{{trans('admin.title')}}</th>
                           <th>{{trans('admin.message')}}</th>
                           <th>{{trans('admin.date')}}</th>
                           <th>{{trans('admin.actions')}}</th>
                         </tr>
                       </thead>

                       <tbody id="contacttable">
                           @foreach ($contacts as $data)
                           <?php  
                           $string = substr( $data->message,0,100).'...'; ?>
                             <tr class="item{{$data->id}}">
                               <td><input type="checkbox" name="ids[]" value={{$data->id}} class="check icheck"></td>
                               <td>{{ $data->name }}</td>
                               <td>{{ $data->email }}</td>
                               <td>{{ $data->title }}</td>
                               <td>{{ $string }}</td>
                               <td>{{ $data->created_at->format('Y-m-d H:i:s')}}</td>

                                <td>
                                @can('contacts-delete')
                               <a href="#" class=" delete-modal btn btn-danger btn-round" title="{{trans('admin.delete')}}" data-id="{{$data->id}}" >
                                  <span class="glyphicon glyphicon-trash"></span>
                               </a>
                                @endcan
                               <a href="#" class=" show-modal btn btn-success btn-round" title="{{trans('admin.more')}}" data-id="{{$data->id}}"  data-data="{{$data}}">
                                <span class="glyphicon glyphicon-list"></span>
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
        <div id="modal"> 
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
       <!--modal for deleteall -->
        <div id="deleteallModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        {{--  <h4 class="modal-title"></h4>  --}}
                         <div class="panel-heading " style="text-align: center"> <h4>{{trans('admin.delete_contacts')}}</h4>
                        </div>  
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">{{trans('admin.notselected_delete')}}</h3>
                        <br />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> {{trans('admin.Close')}} 
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!--modal for show -->
       <div id="showModal" class="modal fade" role="dialog">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">×</button>
                       {{--  <h4 class="modal-title"></h4>  --}}
                        <div class="panel-heading " style="text-align: center"> <h4>{{trans('admin.show_contact')}}</h4>
                       </div>  
                   </div>
                   <div class="modal-body">
                    <div class="panel-body">
                        <div class="box-body table-responsive">
                          <table id="example2" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>{{trans('admin.name')}}</th>
                                    <td class="nametd"></td> 
                                </tr>
                                <tr>
                                    <th>{{trans('admin.email')}}</th>
                                    <td class="emailtd"></td> 
                                </tr>
                                <tr>
                                    <th>{{trans('admin.title')}}</th>
                                    <td class="titletd"> </td> 
                                </tr>
                                <tr>
                                    <th>{{trans('admin.message')}}</th>
                                    <td class="messagetd"></td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.date')}}</th>
                                    <td class="datetd"></td> 
                                </tr>
                                
                              
                            </thead>
     
                           
                          </table>
                        
                        </div>
                      </div>
                       <div class="modal-footer">
                           
                           <button type="button" class="btn btn-warning" data-dismiss="modal">
                               <span class='glyphicon glyphicon-remove'></span> {{trans('admin.Close')}} 
                           </button>
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
       $(document).on('click', '.show-modal', function() {
        data = $(this).data('data');
        {{-- $data->created_at->format('Y-m-d H:i:s') --}}
        $('#id_delete').val($(this).data('id'));
        $('.nametd').html(data.name);
        $('.emailtd').html(data.email);
        $('.titletd').html(data.title);
        $('.messagetd').html(data.message);
        $('.datetd').html(data.created_at);
        $('#showModal').modal('show');
        id = $('#id_delete').val();
        });




       // this for delete record
       // this for delete record or delete mor than one
       $('.modal-footer').on('click', '.delete', function() {
        var choices = [];
        checkboxes = document.getElementsByName('ids[]');
        for (var i=0;i<checkboxes.length;i++){
            if ( checkboxes[i].checked ) {
            choices.push(checkboxes[i].value);
            }
        }
        if(choices.length >= 1){
            var form = $(this);
            openModal();
            $.ajax({
                type: 'POST',
                url: '{{ URL::route("contactdeleteall") }}',
                data:  new FormData($("#contactss_form")[0]),
                processData: false,
                  contentType: false,
                
                success: function(data) {

                    if ((data.errors)) {
                        closeModal();
                       toastr.error('{{trans('admin.Validation_error')}}', '{{trans('admin.Error_Alert')}}', {timeOut: 5000});
                   
                    } else {
                        closeModal();
                        toastr.success('{{trans('admin.successfully_deleted')}}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
                        for (var i=0;i<data.length;i++){
                            console.log(data)
                            $('.item' + data[i]).remove();
                            {{--  console.log(data[i]) ;   --}}
                        }

                    }
                },
            });
        }
        else{
            openModal();
            $.ajax({
                type: 'GET',
                url: "<?php echo url('/')?>/admin/home/contacts/delete/" + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    closeModal();
                    toastr.success('{{trans('admin.successfully_deleted')}}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                }
            });
        }
      
      

    });

    //this for deleteall 
    $('#contactss_form').submit(function(e){
       
        e.preventDefault();
        var choices = [];
        checkboxes = document.getElementsByName('ids[]');
        for (var i=0;i<checkboxes.length;i++){
            if ( checkboxes[i].checked ) {
                choices.push(checkboxes[i].value);
            }
        }
        if(choices.length >= 1){
            $('.modal-title').text('{{trans('admin.delete')}}');
            $('#id_delete').val($(this).data('id'));
            $('#deleteModal').modal('show');

        }
        else{
            $('#deleteallModal').modal('show');
            
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