@extends('layouts.index')
@section('content')
    <section class="content-header">
        <h1>
        {{trans('admin.reports')}}
        <small> {{trans('admin.Control_panel')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-home"></i>{{trans('admin.home')}}</a></li>
            <li><a href="{{route('reports')}}"><i class="fa fa-cog"></i>{{trans('admin.reports')}}</a></li>
        </ol>

    
    </section>

        <!-- Main content -->
        <section class="content">
            {{-- <fieldset>
                    
                    {!! Form::open(['route'=>['searchreports'],'class'=> 'form-inline','method'=>'post','autocomplete'=>'off','role'=>'form','id'=>'formreports'])!!}
                    <div class="row divreport" >
                        <div class="col-md-5 col-xs-12">
                            <div class="row form-group" style="display: flex">
                                <div class="col-md-3">
                                    {!! Form::label('service_id',trans('admin.service')) !!}
                                </div>
                                <div class="col-md-9">
                                    {!! Form::select('service_id',$services
                                        ,'',['class'=>'form-control select2' ,'id' => 'service_id_field' ,'placeholder' =>trans('admin.choose')]) !!}
                                </div>
                            
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-12">
                            <div class="row form-group" style="     width: 100%;display: flex">
    
                                <div class="col-xs-2">
                                    {!! Form::label('date',trans('admin.period1')) !!}
                                </div>
                                <div class="col-xs-10">
                                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span></span> <i class="fa fa-caret-down"></i>
                                    <input type="hidden" name="start" id="start" >
                                    <input type="hidden" name="end"  id="end">
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
    
                        <div class="col-md-2 col-xs-12">
                            <button type="submit" class="btn btn-success">{{trans('admin.search')}}</button>
                        </div> 
                    </div>
                        
                {!! Form::close()!!}
            </fieldset> --}}
            

            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                    <div class="inner">
                            <h3 class="count">{{$clients}}</h3>
                        <p>{{trans('admin.clients')}}</p>
                    </div>
                    <div class="icon">
                        {{--  <i class="ion ion-person-stalker"></i>  --}}
                        <i class="ion ion-person-stalker "></i>
                        
                    </div>
                    <a href="{{ route('clients') }}" class="small-box-footer">{{trans('admin.More_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-green">
                    <div class="inner">
                            <h3 class="count">{{$departments}}</h3>

                        <p>{{trans('admin.departments')}}</p>
                    </div>
                    <div class="icon ">
                        <i class="ion ion-navicon-round "></i>
                    </div>
                    <a href="{{ route('departments') }}" class="small-box-footer">{{trans('admin.More_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-red">
                    <div class="inner">
                        <h3 class="count">{{$users}}</h3>

                        <p>{{trans('admin.users')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="{{ route('users') }}" class="small-box-footer">{{trans('admin.More_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                    <div class="inner">
                        <h3 class="count orders">{{$orders}}</h3>

                        <p>{{trans('admin.orders')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('orders') }}" class="small-box-footer">{{trans('admin.More_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div> 
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('admin.ordersperweek') }}</div>
                <div class="panel-body">
                    <canvas id="myChart1" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('admin.salesperyear') }}</div>
                <div class="panel-body">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div>

        </section>

@endsection 

@section('style')
@if($lang == 'ar')
<style>
    .nav-tabs {
        margin-right: -42px;
        float: right;
    }
    .nav-tabs>li {
        float: right;   
    }
    
</style>
@endif
<style> 
        .fstElement {
            display: inline-block;
            position: relative;
            border: 1px solid #5b8b44;
            box-sizing: border-box;
            color: #232323;
            font-size: .6em;
            background-color: #fff;
          
        }
        .fstMultipleMode .fstControls {
            box-sizing: border-box;
            padding: 0.5em 0.5em 0em 0.5em;
            overflow: hidden;
            width: 100%;
            cursor: text;
        }
        .fstMultipleMode.fstActive .fstResults {
            display: block;
            z-index: 10;
            overflow-y: scroll;
            max-height: 168px;
            border-top: 1px solid #D7D7D7;
        }
        fieldset,legend {
            border: 1px solid #fff !important ;

            text-align: center !important ;
        }
        legend{
            background-color: #fff !important ;
            color: #fff !important ;
        }
        fieldset {
            min-width: 0 !important ;
            padding: 10px !important ;
            margin: 13px !important ;
            border: 1px solid #fff !important ;
        }
        .form-inline .form-group {
            width: 100% !important ;
        }
        .bg-white{
            background-color: #ffffff !important;
        }
    </style> 
@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script>
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();
        
            function cb(start, end) {
                $('#reportrange span').html(start.format('D, M,YYYY') + ' - ' + end.format('D, M,YYYY'));
                $('#start').val(start);
                $('#end').val(end);
            }
        
            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                "showDropdowns": true,
                "showWeekNumbers": true,
                "showISOWeekNumbers": true,
                "autoApply": true,
                ranges: {
                   'Today': [moment(), moment()],
                   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                   'This Month': [moment().startOf('month'), moment().endOf('month')],
                   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
        
            cb(start, end);
        
        });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script>
    var dates = [] ;
    var i =0 ;
    @foreach($weeks as $date)
        dates[i] =  "{{ $date }}"  ;
        i++ ;
    @endforeach

    var sales = [] ;
    var i =0 ;
    @foreach($saless as $sales)
        sales[i] =  "{{ $sales }}"  ;
        i++ ;
    @endforeach

    var salessmonth = [] ;
    var i =0 ;

    @foreach($salessmonth as $salessmont)
    salessmonth[i] =  "{{ $salessmont }}"  ;
        i++ ;
    @endforeach

    var months = [] ;
    var i =0 ;
    @foreach($months as $month)
    months[i] =  "{{ $month }}"  ;
        i++ ;
    @endforeach


    var ctx1 = document.getElementById("myChart1").getContext('2d');
    ctx1.height = 500;
    var myChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'الطلبات',
                data: sales,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(140, 152, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(140, 152, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 3
            }]
        },
        options: {
            maintainAspectRatio: false,
            showLabelBackdrop : true ,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
    
    var ctx = document.getElementById("myChart").getContext('2d');
    ctx.height = 500;
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'الطلبات',
                data: salessmonth,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            showLabelBackdrop : false ,
            legend: {
                labels: {
                    fontColor: 'green'
                    }
                },
        title: {
            display: true,
            fontColor: 'blue',
            text: '{{trans('admin.salesperyear') }}',
            defaultFontSize:18
        }     ,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    fontColor: 'black'
                    
                },
            }],
            xAxes: [{
                ticks: {
                    fontColor: 'black'
                },
            }]
        } 
        
        }
    });

    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    $("#formreports").submit(function(e){
       e.preventDefault();
       var form = $(this);

       $.ajax({
           type: 'POST',
           url: '{{ URL::route("searchreports") }}',
           data:  new FormData($("#formreports")[0]),
           processData: false,
             contentType: false,
           
           success: function(data) {


               if ((data.errors)) {
                   console.log(data.errors);


               } else {
                    console.log(data.orders);
                    $('.orders').html(data.orders);
                   {{-- toastr.success('{{trans('admin.successfully_added')}}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000}); --}}
                  
               }
           },
       });
    });
</script>
    
@endsection
    
@section('script1')
<script>
        $('.select2').select2();
        function removeItem(item){
            {{--  console.log(item);  --}}
            $('.'+item).remove();
        }
      jQuery(function($){
        $(document).on('click', '.delete-modal', function() {

          $('.modal-title').text('{{trans('admin.delete')}}');
          $('#id_delete').val($(this).data('id'));
          $('#deleteModal').modal('show');
          id = $('#id_delete').val();
        });
        // this for delete record
      

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
