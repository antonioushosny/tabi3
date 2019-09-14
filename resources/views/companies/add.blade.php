@extends('layouts.index')
@section('style')

@endsection
 @section('content')
<!-- Main Content -->
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>{{__('admin.dashboard')}}
                <small>{{__('admin.Welcome to beitk')}}</small>
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
                    <li class="breadcrumb-item"><a href="{{route('companies')}}"><i class="zmdi zmdi-accounts-add"></i> {{__('admin.companies')}}</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">@if(isset($data->id)) {{__('admin.edit_companie')}} @else {{__('admin.add_companie')}} @endif</a></li>
                    
                </ul>
            </div>
        </div>
    </div>

     
    <div class="container-fluid">
        
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
               
                    <div class="header">
                        <h2><strong>{{trans('admin.'.$title)}}</strong> @if(isset($data->id)) {{trans('admin.edit_companie')}}  @else {{__('admin.add_companie')}} @endif  </h2>
                        
                    </div>
                    <div class="body">
                        {!! Form::open(['route'=>['storecompanie'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ])!!} 
                            <!-- for id -->
                            <div class= "form-group form-float">
                                {!! Form::hidden('id',!isset($data->id)?null:$data->id ,['class'=>'form-control show-tick']) !!}
                            </div>
                            
                            <div class= "form-group form-float">
                                {!! Form::select('department_id',$departments
                                    ,!isset($data->department_id)?null:$data->department_id ,['class'=>'form-control show-tick' ,'placeholder' =>trans('admin.choose_department'),'required']) !!}
                                    <label id="department_id-error" class="error" for="department_id" style="">  </label>
                            </div> 
                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->name)?'':$data->name }}" class="form-control" placeholder="{{__('admin.placeholder_name')}}" name="name" required>
                                <label id="name-error" class="error" for="name" style="">  </label>
                            </div>

                            <div class="form-group form-float">
                                <input type="email" value="{{ !isset($data->email)?'':$data->email }}" class="form-control" placeholder="{{ __('admin.placeholder_email')}}" name="email" autocomplete="username email"  required>
                                <label id="email-error" class="error" for="email" style=""></label>
                            </div>

                            <div class="form-group form-float">
                                <input type="password"  class="form-control" placeholder="{{__('admin.placeholder_password')}}" name="password"  autocomplete="new-password">
                                <label id="password-error" class="error" for="password" style=""></label>
                            </div>
                            
                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->mobile)?'':$data->mobile }}" class="form-control" placeholder="{{__('admin.placeholder_mobile')}}" name="mobile" onkeypress="isNumber(event); " required>
                                <label id="mobile-error" class="error" for="mobile" style="">  </label>
                            </div>

                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->address)?'':$data->address }}" class="form-control" placeholder="{{__('admin.placeholder_address')}}" name="address" required>
                                <label id="address-error" class="error" for="address" style="">  </label>
                            </div>

                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->fax)?'':$data->fax }}" class="form-control" placeholder="{{__('admin.placeholder_fax')}}" name="fax" required>
                                <label id="fax-error" class="error" for="fax" style="">  </label>
                            </div>
                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->url)?'':$data->url }}" class="form-control" placeholder="{{__('admin.placeholder_url')}}" name="url"  >
                                <label id="url-error" class="error" for="url" style="">  </label>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2> <strong>{{ __('admin.desc') }}</strong>  </h2>
                                        <ul class="header-dropdown">
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <textarea id="ckeditor" name="desc" placeholder="{{__('admin.placeholder_desc')}}">
                                            {{ !isset($data->desc)?' ':$data->desc }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- {{--  for map      --}}  -->

                            <div class="form-group form-float">
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

                            <!-- for image  -->
                            <div class="form-group form-float row"  >
                                {{--  for image  --}}
                                <div class= "col-md-2 col-xs-3">
                                    <div class="form-group form-float  " >
                                        <div style="position:relative; ">
                                            <a class='btn btn-primary' href='javascript:;' >
                                                {{trans('admin.Choose_Image')}}
        
                                                {!! Form::file('image',['class'=>'form-control','id' => 'image_field', 'accept'=>'image/x-png,image/gif,image/jpeg' ,'style'=>'position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;','size'=> '40' ,'onchange' => 'readURL(this,"changeimage");' ]) !!}
                                            </a>
                                            &nbsp;
                                            <div class='label label-primary' id="upload-file-info" ></div>
                                            <span style="color: red " class="image text-center hidden"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                @if(isset($data->id))
                                    <img id="changeimage" src="{{asset('img/'.$data->image)}}" width="100px" height="100px" alt=" {{trans('admin.image')}}" />
                                @else 
                                    <img id="changeimage" src="{{asset('images/default.png')}}" width="100px" height="100px" alt=" {{trans('admin.image')}}" />
                                @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="active" class="with-gap" value="active" checked>
                                    <label for="active">{{__('admin.active')}}</label>
                                </div>                                
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="not_active" class="with-gap" value="not_active" <?php echo ( isset($data->status) && $data->status == 'not_active') ? "checked=''" : ""; ?>>
                                    <label for="not_active">{{__('admin.not_active')}}</label>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(isset($data->id))
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">{{__('admin.edit')}}</button>
                            @else
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">{{__('admin.add')}}</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
    </div>

</section>
  
@endsection 

@section('script')

<script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/editors.js') }}"></script>
<script>
    //this for add new record
    $("#form_validation").submit(function(e){
           {{--  $('#addModal').modal('hide');  --}}
           $('.add').disabled =true;
          e.preventDefault();
          var form = $(this);
        //    openModal();
          $.ajax({
              type: 'POST',
              url: '{{ URL::route("storecompanie") }}',
              data:  new FormData($("#form_validation")[0]),
              processData: false,
              contentType: false,
               
              success: function(data) {
                  if ((data.errors)) {                        
                        if (data.errors.name) {
                            $('#name-error').css('display', 'inline-block');
                            $('#name-error').text(data.errors.name);
                        }
                        if (data.errors.mobile) {
                            $('#mobile-error').css('display', 'inline-block');
                            $('#mobile-error').text(data.errors.mobile);
                        }
                        if (data.errors.url) {
                            $('#url-error').css('display', 'inline-block');
                            $('#url-error').text(data.errors.url);
                        }
                        
                  } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ URL::route("storecompanie") }}',
                        data:  new FormData($("#form_validation")[0]),
                        processData: false,
                        contentType: false,
                         
                        success: function(data) {
                            if ((data.errors)) {                        
                                  if (data.errors.name) {
                                      $('#name-error').css('display', 'inline-block');
                                      $('#name-error').text(data.errors.name);
                                  }
                                  if (data.errors.mobile) {
                                      $('#mobile-error').css('display', 'inline-block');
                                      $('#mobile-error').text(data.errors.mobile);
                                  }
                            } else {
                                  @if(Auth::user()->role == 'admin')
                                  window.location.replace("{{route('companies')}}");
                                  @else 
                                  location.reload();
                                  @endif
          
                               }
                      },
                    });

                     }
            },
          });
        });

</script>
      
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-A44M149_C_j4zWAZ8rTCFRwvtZzAOBE&libraries=places&signed_in=true&callback=initMap"></script>
<script>


function initMap() {
    @if(isset($data->lat) && isset($data->lng) )
        lat =  "{{$data->lat}}"
        lng =  "{{$data->lng}}"
    @else 
        lat =  "29.967176910157654"
        lng =  "31.21215951392594"
    @endif 
    
    lat = parseFloat(lat)
    lng = parseFloat(lng)
    console.log(lat) 
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: lat, lng: lng},
        zoom: 18,
        mapTypeId: 'terrain'
    });
    var marker = new google.maps.Marker({
        position: {lat: lat, lng: lng},
        map: map
    });
    var infoWindow = new google.maps.InfoWindow({map: map});

    // Try HTML5 geolocation.
    @if(!isset($data->lat) || !isset($data->lng) )
    console.log('not found data') 
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
    @endif

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

}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
infoWindow.setPosition(pos);
infoWindow.setContent(browserHasGeolocation ?
        'The Geolocation service failed.  ' :
        'Your browser doesnt support geolocation. ');
}
</script>  
@endsection
