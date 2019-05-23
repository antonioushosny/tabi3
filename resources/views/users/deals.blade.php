@extends('layouts.index')

 @section('content')
    <section class="content-header">
        <h1>
            {{trans('admin.deals')}}
        <small>{{trans('admin.Control_panel')}}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
          <li class="active"><a href="{{ route('users') }}">{{trans('admin.users')}}</a></li>
          <li class="active"><a href="#">{{trans('admin.deals')}}</a></li>
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
                                <span style="font-size:2em ;"><i class="fa fa-cog"></i> {{trans('admin.deals')}}</span>

                            </div>
                            <div class=" col-md-4">


                            </div>
                        </div>
                    </section>
                  </div>
                  <div class="panel-body">
                    <div class="box-body table-responsive">
                      <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            
                            
                            <th>{{trans('admin.title_ar')}}</th>
                            <th>{{trans('admin.original_price')}}</th>
                            <th>{{trans('admin.initial_price')}}</th>
                            <th>{{trans('admin.points')}}</th>
                            <th>{{trans('admin.tickets')}}</th>
                            <th>{{trans('admin.expiry_date')}}</th>
                            <th>{{trans('admin.image')}}</th>
                            <th>{{trans('admin.status')}}</th>
                          </tr>
                        </thead>

                        <tbody id="adminstable">
                            @foreach ($deals as $data)
                              <tr class="item{{$data['id']}}">
                               
                                <td>{{ $data['title_ar'] }}</td>
                                <td>{{ $data['original_price'] }}</td>
                                <td>{{ $data['initial_price'] }}</td>
                                <td>{{ $data['points'] }}</td>
                                <td>{{ $data['tickets'] }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($data['expiry_date']))}} </td>
                                @if($data['image'])
                                <td><img src="{{asset('img/').'/'.$data['image'] }}" width="50px" height="50px"></td>
                                @else 
                                <td><img src="{{asset('images/default.png') }}" width="50px" height="50px"></td>
                                @endif
                                @if($data['status'] == 'active')
                                  <td style="text-align:center"><span  class="badge">{{ trans('admin.active')}}</span></td> 
                                @elseif($data['status'] == 'not_active')
                                  <td style="text-align:center"><span  class="badge">{{ trans('admin.not_active')}}</span></td> 
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

    {{-- <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="panel panel-green">
                  <div class="panel-heading">
                    <section class="content-header" style=" !important;">
                        <div class="row" style="display:flex;">
                            <div class="col-md-8" >
                                <span style="font-size:2em ;"><i class="fa fa-cog"></i> {{trans('admin.deals')}}</span>

                            </div>
                            <div class=" col-md-4">

                            </div>
                        </div>
                    </section>
                  </div>
                  <div class="panel-body">
                    <div class="box-body table-responsive">
                      <table id="example" class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                                                        
                            <th>{{trans('admin.title_ar')}}</th>
                            <th>{{trans('admin.original_price')}}</th>
                            <th>{{trans('admin.initial_price')}}</th>
                            <th>{{trans('admin.points')}}</th>
                            <th>{{trans('admin.tickets')}}</th>
                            <th>{{trans('admin.expiry_date')}}</th>
                            <th>{{trans('admin.image')}}</th>
                            <th>{{trans('admin.status')}}</th>
                          </tr>
                        </thead>

                        <tbody id="adminstable">
                            @foreach ($deals as $data)
                              <tr class="item{{$data->id}}">
                               
                                <td>{{ $data->title_ar }}</td>
                                <td>{{ $data->original_price }}</td>
                                <td>{{ $data->initial_price }}</td>
                                <td>{{ $data->points }}</td>
                                <td>{{ $data->tickets }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($data->expiry_date))}} </td>
                                @if($data->image)
                                <td><img src="{{asset('img/').'/'.$data->image }}" width="50px" height="50px"></td>
                                @else 
                                <td><img src="{{asset('images/default.png') }}" width="50px" height="50px"></td>
                                @endif
                                @if($data->status == 'active')
                                  <td style="text-align:center"><span  class="badge">{{ trans('admin.active')}}</span></td> 
                                @elseif($data->status == 'not_active')
                                  <td style="text-align:center"><span  class="badge">{{ trans('admin.not_active')}}</span></td> 
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
    </section> --}}
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