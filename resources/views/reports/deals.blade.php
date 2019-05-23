@extends('layouts.index')

 @section('content')
    <section class="content-header">
        <h1>
            {{trans('admin.reportsdeals')}}
        <small>{{trans('admin.Control_panel')}}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
          <li class="active"><a href="{{ route('reportsdeals') }}">{{trans('admin.reportsdeals')}}</a></li>
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
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="panel panel-green">
                  <div class="panel-heading">
                    <section class="content-header" style=" !important;">
                        <div class="row" style="display:flex;">
                            <div class="col-md-8" >
                                <span style="font-size:2em ;"><i class="fa fa-cog"></i> {{trans('admin.reportsdeals')}}</span>

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
                                                        
                            <th>{{trans('admin.user_name')}}</th>
                            <th>{{trans('admin.mobile')}}</th>
                            <th>{{trans('admin.points')}}</th>
                            <th>{{trans('admin.deal')}}</th>
                            {{-- <th>{{trans('admin.cost')}}</th> --}}
                            <th>{{trans('admin.original_price')}}</th>
                            <th>{{trans('admin.initial_price')}}</th>
                            <th>{{trans('admin.tickets')}}</th>
                            <th>{{trans('admin.created_at')}}</th>
                          </tr>
                        </thead>

                        <tbody id="adminstable">
                            @foreach ($deals as $data)
                              <tr class="item{{$data->id}}">
                               
                                <td>{{ $data->name }}</td>
                                @if($data->user)
                                <td>{{ $data->user->mobile }}</td>
                                @else 
                                <td></td>
                                @endif 
                                <td>{{ $data->points }}</td>
                                 @if($data->deal)
                                <td>{{ $data->deal->title_ar }}</td>
                                <td>{{ $data->deal->original_price }}</td>
                                <td>{{ $data->deal->initial_price }}</td>
                                <td>{{ $data->deal->tickets }}</td>
            
                                @else 
                                <td></td>
                                @endif 
                                <td>{{ $data->created_at->format('Y-m-d H:i:s') }}</td>
              
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
   
@endsection 
