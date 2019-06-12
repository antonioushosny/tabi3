@extends('layouts.index')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

    @if($lang == 'ar')
    <style>
        .dtp ,.datetimepicker, .join_date{
            direction: ltr !important ;
            border-radius: 0 30px 30px 0 !important;
        }
        /* style for map  */
        #map {
            height: 100%;
        }
        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        .pac-container {
            font-family: Roboto;
        }
        /* end style for map */

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1.6px solid #aaa;
            border-radius: 13px;
            max-width: 97%;
            /* border: 1px solid; */
        }
    </style>
    @endif
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
                    <li class="breadcrumb-item"><a href="{{route('orders')}}"><i class="zmdi zmdi-accounts-add"></i> {{__('admin.orders')}}</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">{{__('admin.order_detail')}}</a></li>
                    
                </ul>
            </div>
        </div>
    </div>

     
    <div class="order-fluid">
        
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>{{trans('admin.client_detail')}}  </strong> </h2>

                    </div>
                    <div class="body">
                        <h4><strong>{{trans('admin.user_name')}} :- </strong> {{ $order->user_name }}  </h4>
                        <h4><strong>{{trans('admin.user_mobile')}} :- </strong> {{ $order->user_mobile }}  </h4>
                        @if($order->user && $order->user->City)
                            @if($lang == 'ar')
                            <h4><strong>{{trans('admin.city')}} :- </strong> {{ $order->user->City->name_ar }}  </h4>
                            <h4><strong>{{trans('admin.area')}} :- </strong> {{ $order->user->Area->name_ar }}  </h4>
                            @else 
                            <h4><strong>{{trans('admin.city')}} :- </strong> {{ $order->user->City->name_en }}  </h4>
                            <h4><strong>{{trans('admin.area')}} :- </strong> {{ $order->user->Area->name_en }}  </h4>
                            @endif
                        @else 
                        <h4><strong>{{trans('admin.city')}} :- </strong> {{ $order->city }}  </h4>
                        <h4><strong>{{trans('admin.area')}} :- </strong> {{ $order->area }}  </h4>
                        @endif
                        <h4><strong>{{trans('admin.location')}} :- </strong> </h4>

                        <!-- {{--  for map      --}}  -->
                            <div class="form-group">
                                <span style="color: black "> 
                                    {!! Form::label('location',trans('admin.location')) !!}
                                </span>
                                <input id="pac-input" class="controls" type="text" placeholder="{{trans('admin.Search_Box')}}">

                                <div class="col-md-12" id="map" style="width:100%;height:400px;"></div>
                                <label id="lat-error" class="error" for="lat" style="">  </label>
                            </div><br/>        

                            <div class="form-group">
                                {{--  {!! Form::label('lat',trans('admin.lat')) !!}  --}}
                                {!! Form::hidden('lat','',['class'=>'form-control', 'id' => 'lat','placeholder' => trans('admin.placeholder_lat')]) !!}

                                {{--  {!! Form::label('lng',trans('admin.lng')) !!}  --}}
                                {!! Form::hidden('lng','',['class'=>'form-control', 'id' => 'lng','placeholder' => trans('admin.placeholder_lng')]) !!}

                            </div><br/> 
                        <!-- end map -->
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>{{trans('admin.order_detail')}}</strong>   </h2>
                            
                        </div>
                        <div class="body">
                            @if($lang == 'ar')
                                <h4><strong>{{trans('admin.container')}} :- </strong> {{ $order->container_name_ar }}  </h4>
                            @else   
                                <h4><strong>{{trans('admin.container')}} :- </strong> {{ $order->container_name_en }}  </h4>
                            @endif
                            <h4><strong>{{trans('admin.container_size')}} :- </strong> {{ $order->container_size }}  </h4>
                            <h4><strong>{{trans('admin.price')}} :- </strong> {{ $order->price }}  </h4>
                            <h4><strong>{{trans('admin.no_container')}} :- </strong> {{ $order->no_container }}  </h4>
                            <h4><strong>{{trans('admin.total')}} :- </strong> {{ $order->total }}  </h4>
                            <h4><strong>{{trans('admin.notes')}} :- </strong> {{ $order->notes }}  </h4>
                            <h4><strong>{{ trans('admin.status') }} :- </strong> {{ trans('admin.'.$order->status) }}  </h4>
                           
                        </div>
                    </div>
                </div>
        </div>
  
    </div>

</section>
  
@endsection 

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script>
    $('.select2').select2();
    //this for add new record
    $("#form_validation").submit(function(e){
          e.preventDefault();
          var form = $(this);
        //    openModal();
          $.ajax({
              type: 'POST',
              url: '{{ URL::route("storeorder") }}',
              data:  new FormData($("#form_validation")[0]),
              processData: false,
              contentType: false,
               
              success: function(data) {
                  if ((data.errors)) {                        
                        if (data.errors.company_name) {
                            $('#company_name-error').css('display', 'inline-block');
                            $('#company_name-error').text(data.errors.company_name);
                        }
                        if (data.errors.responsible_name) {
                            $('#responsible_name-error').css('display', 'inline-block');
                            $('#responsible_name-error').text(data.errors.responsible_name);
                        }
                        if (data.errors.image) {
                            $('#image-error').css('display', 'inline-block');
                            $('#image-error').text(data.errors.image);
                        }
                        if (data.errors.lat) {
                            $('#lat-error').css('display', 'inline-block');
                            $('#lat-error').text(data.errors.lat);
                        }
                  } else {
                        window.location.replace("{{route('orders')}}");

                     }
            },
        });
    });



</script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-A44M149_C_j4zWAZ8rTCFRwvtZzAOBE&libraries=places&signed_in=true&callback=initMap"></script>
<script>


function initMap() {
@if(1==2)    
    var lat1 = {{$order->lat}};
    var lng1 = {{$order->lng}}
    var haightAshbury = {lat: lat1 , lng:lng1 };
    console.log(haightAshbury) ;
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 18,
        order: haightAshbury,
        mapTypeId: 'terrain'
    });

    var marker = new google.maps.Marker({
        position: haightAshbury,
        map: map
    });
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    map.addListener('click', function(event) {
        //clear previous marker
        marker.setMap(null);
        //set new marker
        marker = new google.maps.Marker({
        position: event.latLng,
        map: map
        });
        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value = event.latLng.lng();
    });
    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
    return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
    marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
    var icon = {
    url: place.icon,
    size: new google.maps.Size(71, 71),
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(17, 34),
    scaledSize: new google.maps.Size(25, 25)
    };

    // Create a marker for each place.
    markers.push(new google.maps.Marker({
    map: map,
    icon: icon,
    title: place.name,
    position: place.geometry.location
    }));

    document.getElementById('lat').value = place.geometry.location.lat();
    document.getElementById('lng').value = place.geometry.location.lng();
    if (place.geometry.viewport) {
    // Only geocodes have viewport.
    bounds.union(place.geometry.viewport);
    } else {
    bounds.extend(place.geometry.location);
    }
    });
    map.fitBounds(bounds);
    });

@else 
    var map = new google.maps.Map(document.getElementById('map'), {
        order: {lat: 29.967176910157654, lng: 31.21215951392594},
        zoom: 18,
        mapTypeId: 'terrain'
    });
    var marker = new google.maps.Marker({
        position: {lat: 29.967176910157654, lng: 31.21215951392594},
        map: map
    });
    var infoWindow = new google.maps.InfoWindow({map: map});

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
    var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
    };
    document.getElementById('lat').value = position.coords.latitude;
    document.getElementById('lng').value = position.coords.longitude;
    infoWindow.setPosition(pos);
    
    infoWindow.setContent('location found');
    map.setCenter(pos);
    }, function() {
    handleLocationError(true, infoWindow, map.getCenter());
    });

    } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
    }

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
    });

    map.addListener('click', function(event) {
    //clear previous marker
    marker.setMap(null);
    //set new marker
    marker = new google.maps.Marker({
    position: event.latLng,
    map: map
    });
    document.getElementById('lat').value = event.latLng.lat();
    document.getElementById('lng').value = event.latLng.lng();
    });
    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
    return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
    marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
    var icon = {
    url: place.icon,
    size: new google.maps.Size(71, 71),
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(17, 34),
    scaledSize: new google.maps.Size(25, 25)
    };

    // Create a marker for each place.
    markers.push(new google.maps.Marker({
    map: map,
    icon: icon,
    title: place.name,
    position: place.geometry.location
    }));

    document.getElementById('lat').value = place.geometry.location.lat();
    document.getElementById('lng').value = place.geometry.location.lng();
    if (place.geometry.viewport) {
    // Only geocodes have viewport.
    bounds.union(place.geometry.viewport);
    } else {
    bounds.extend(place.geometry.location);
    }
    });
    map.fitBounds(bounds);
    }); 
@endif

}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
infoWindow.setPosition(pos);
infoWindow.setContent(browserHasGeolocation ?
        'The Geolocation service failed.' :
        'Your browser doesnt support geolocation. ');
}
</script>
@endsection
