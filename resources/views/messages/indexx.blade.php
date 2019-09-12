@extends('layouts.index')

 @section('content')
    <section class="content-header">
        <h1>
            {{trans('admin.messages')}}
        <small>{{trans('admin.Control_panel')}}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
          <li class="active"><a href="{{ route('messages') }}">{{trans('admin.messages')}}</a></li>
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
          <!-- <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> -->
          @endif
        @endforeach
    </div>
   
    
    <!-- Main content -->
     <?php $msg = trans('admin.confirm_delete') ; ?> 
      {!! Form::open(['route'=>['send_messages'],'method'=>'post','autocomplete'=>'off', 'id'=>'messagess_form' ])!!}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="panel panel-green">
                  <div class="panel-heading">
                 
                    <section class="content-header" style="padding:17px !important;">
                        
                          <h1>
                             <i class="fa fa-cog"></i> {{trans('admin.messages')}}
                          
                          </h1>
      
                    </section>

                  </div>
                  <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    <!-- <p class="alert alert-danger">{{ $error }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> -->
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="row">

                            <div class="col-md-2"> </div>

                                <div class="form-group col-md-8">
                                  <span style="color: black ; width:100%"> *
                                      {!!Form::label('title',trans('admin.title')) !!}
                                      {!! Form::text('title','',['class'=>'form-control','id' => 'title_field','placeholder' => trans('admin.placeholder_title')]) !!}
                                  </span>
                                  <span style="color: red " class="title text-center hidden"></span>
                                </div> <br/> 
                            <div class="col-md-2"> </div>
                        </div>
                    
                        
                        <div class="row">
                            <div class="col-md-2"> </div>
                                <div class="form-group col-md-8">
                                  <span style="color: black ; width:100%"> *
                                      {!!Form::label('message',trans('admin.message')) !!}
                                      {!! Form::textarea('message','',['class'=>'form-control','rows'=>'2','id' => 'message_field','placeholder' => trans('admin.placeholder_message')]) !!}
                                  </span>
                                  <span style="color: red " class="message text-center hidden"></span>
                                </div> <br/>
                            <div class="col-md-2"> </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"> </div>
                                <div class="form-group col-md-8">
                                  <span style="color: black ; width:100% "> 
    
                                        {!!Form::label('for',trans('admin.sendforall')) !!}
        
                                        <input class="form-control" type="radio" name="for" id="sendforall_field" value="all" checked>
                                        
                                        {!!Form::label('for',trans('admin.send_spec')) !!}
                                        <input class="form-control" type="radio" name="for" id="send_field" value="not_all">


                                  </span>
                                  <span style="color: red " class="message text-center hidden"></span>
                                </div> <br/>
                            <div class="col-md-2"> </div>
                        </div>
                        <div class="row clients hidden" >
                            <div class="col-md-2"> </div>
                              <div class="form group col-md-8">
                                  <span style="color: black "> 
                                  {!! Form::label('ids',trans('admin.choose')) !!}*
                                  {!! Form::select('ids[]',[]
                                      ,'',['class'=>'form-control select2' ,'id' => 'selectmulty','multiple'=>true]) !!}
                                  </span>
                                  <span style="color: red " class="status1 text-center hidden"></span>
                              </div><br/>  
                        </div>
                       
                        <button type="submit" class="btn btn-primary add" >
                                <span class='glyphicon glyphicon-check'></span> {{trans('admin.send')}}
                        </button>

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


   
@endsection 
@section('style')
  <style> 
    /* .hidden{
        display:none;
    } */

    .panel-body{
        min-height: 35em !important;
    }
    .panel-heading {
        padding: 0;
    }
    .panel-heading ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }
    .panel-heading li {
        float: left;
        border-right:1px solid #bbb;
        display: block;
        padding: 14px 16px;
        text-align: center;
    }
    .panel-heading li:last-child:hover {
        background-color: #ccc;
    }
    .panel-heading li:last-child {
        border-right: none;
    }
    .panel-heading li a:hover {
        text-decoration: none;
    }

    .table.table-bordered tbody td {
        vertical-align: baseline;
    }
    /* icheck checkboxes */
    .iradio_flat-yellow {
        background: url(https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/yellow.png) no-repeat;
    }

  </style>
@endsection

@section('script1')

  <script>

        jQuery(document).ready(function($){

            @foreach($clients as $client)

                $("#selectmulty").append($('<option>', {
                        value: {{$client->id}},
                        text: '{{$client->name}}'
                    }));
            @endforeach
           
            
            $('#send_field').on('ifChecked', function(event) {
                $('.clients').removeClass('hidden'); 
            });
            $('#send_field').on('ifUnchecked', function(event) {
                $('.clients').addClass('hidden');
            });
            $('#send_points_field').on('ifChecked', function(event) {
                $('.points_field').removeClass('hidden');
            });
            $('#send_points_field').on('ifUnchecked', function(event) {
                $('.points_field').addClass('hidden');
            });
            
            $('#for_country').on('ifChecked', function(event) {
                $('.countries').removeClass('hidden'); 
            });
            $('#for_country').on('ifUnchecked', function(event) {
                $('.countries').addClass('hidden');
            });

            $('#for_city').on('ifChecked', function(event) {
                $('.cities').removeClass('hidden'); 
            });
            $('#for_city').on('ifUnchecked', function(event) {
                $('.cities').addClass('hidden');
            });
      });
      jQuery(function($){

        $('.multipleSelect').fastselect();
         
       
        $(document).on('click', '.delete-modal', function() {
            console.log ();
          $('.modal-title').text('{{trans('admin.delete')}}');
          $('#id_delete').val($(this).data('id'));
          $('#deleteModal').modal('show');
          id = $('#id_delete').val();
        });

        // this for delete record
        $('.modal-footer').on('click', '.delete', function() {
          $.ajax({
              type: 'GET',
              url: "<?php echo url('/')?>/home/messages/delete/" + id,
              data: {
                  '_token': $('input[name=_token]').val(),
              },
              success: function(data) {
           
                  toastr.success('{{trans('admin.successfully_deleted')}}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
                  $('.item' + data['id']).remove();
              }
          });
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