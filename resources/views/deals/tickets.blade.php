@extends('layouts.index')

 @section('content')
    <section class="content-header">
        <h1>
            {{trans('admin.tickets')}}
        <small>{{trans('admin.Control_panel')}}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
          @if($title == 'deals')
            <li class="active"><a href="{{ route('deals') }}">{{trans('admin.deals')}}</a></li>       
          @else 
            <li class="active"><a href="{{ route('last_deals') }}">{{trans('admin.last_deals')}}</a></li>       
          @endif
          <li class="active"><a href="#">{{trans('admin.tickets')}}</a></li>
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

    <!-- Main content -->
     <?php $msg = trans('admin.confirm_delete') ; ?> 
      {!! Form::open(['route'=>['dealsdeleteall'],'method'=>'post','autocomplete'=>'off', 'id'=>'dealss_form' ])!!}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="panel panel-green">
                  <div class="panel-heading">
                    <section class="content-header" style=" !important;">
                        <div class="row" style="display:flex;">
                            <div class="col-md-8" >
                                <span style="font-size:2em ;"><i class="fa fa-cog"></i> {{trans('admin.tickets')}}</span>

                            </div>
                            <div class=" col-md-4">
                                {{-- <a href="#" class="add-modal btn btn-primary"><i class="fa fa-plus" ></i> {{trans('admin.add_deal')}}</a>   --}}
                                {{-- <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash" ></i> {{trans('admin.deleteall')}} </button> --}}
                            </div>
                        </div>
                    </section>
                  </div>
                  <div class="panel-body">
                    <div class="box-body table-responsive">
                      <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            
                            {{-- <th><input type="checkbox" class="checkbox icheck" id="check-all" /></th> --}}
                            
                            <th>{{trans('admin.name')}}</th>
                            <th>{{trans('admin.mobile')}}</th>
                            <th>{{trans('admin.points')}}</th>
                            <th>{{trans('admin.status')}}</th>
                            {{-- <th>{{trans('admin.actions')}}</th> --}}
                          </tr>
                        </thead>

                        <tbody id="adminstable">
                            @foreach ($tickets as $data)
                              <tr class="item{{$data->id}}">
                               
                                {{-- <td><input type="checkbox" name="ids[]" value={{$data->id}} class="check icheck"></td> --}}
                                <td>{{ $data->name }}</td>
                                @if($data->user)    
                                <td>{{ $data->user->mobile }}</td>
                                @else 
                                <td></td>
                                @endif
                                <td>{{ $data->points }}</td>
                                @if($data->status == '0')
                                  <td style="text-align:center"><span  class="badge">{{ trans('admin.lost')}}</span></td> 
                                @elseif($data->status == '1')
                                  <td style="text-align:center"><span  class="badge">{{ trans('admin.winner')}}</span></td> 
                                @else 
                                    <td> </td>
                                @endif
                                
              
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