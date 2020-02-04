
  <input type="hidden" value="user" name="role" required>
<!-- for country_id -->
<div class= "form-group form-float">
    {!! Form::select('country_id',$countries
        , isset($user) ? $user->country_id : '',['class'=>'form-control show-tick select2' ,'placeholder' =>trans('admin.choose_country'),'required']) !!}
    <label id="country_id-error" class="error" for="country_id" style="">  </label>
</div>

<!-- for name -->
<div class="form-group form-float">
    <input type="text" class="form-control" placeholder="{{__('admin.name')}}" name="name" value="{{  isset($user) ? $user->name : ''}}" required>
    <label id="name-error" class="error" for="name" style="">  </label>
</div>

<!-- for email -->
<div class="form-group form-float">
    <input type="email" class="form-control" placeholder="{{__('admin.placeholder_email')}}" name="email" autocomplete="off" value="{{  isset($user) ? $user->email : ''}}" required>
    <label id="email-error" class="error" for="email" style=""></label>
</div>

<!-- for password -->
<div class="form-group form-float">
    <input type="password" class="form-control" placeholder="{{__('admin.password')}}" name="password" value="" >
    <label id="password-error" class="error" for="password" style="">  </label>
</div>

<!-- for mobile -->
<div class="form-group form-float">
    <input type="text" class="form-control" placeholder="{{__('admin.mobile')}}" name="mobile" value="{{  isset($user) ? $user->mobile : ''}}" required>
    <label id="mobile-error" class="error" for="mobile" style="">  </label>
</div>

<!-- for address -->
<div class="form-group form-float">
    <input type="text" class="form-control" placeholder="{{__('admin.address')}}" name="address" value="{{  isset($user) ? $user->address : ''}}" required>
    <label id="address-error" class="error" for="address" style="">  </label>
</div>
 
<!-- for desc -->
<div class="form-group form-float">
    {!! Form::textarea('desc', isset($user) ? $user->desc : '', [ 'class'=>"form-control",'placeholder'=> __('admin.desc') ,'id' => 'desc', 'rows' => 4, 'style' => 'resize:none']) !!}
    <label id="desc-error" class="error" for="desc" style="">  </label>
</div>


<!-- for image  -->
<div class="form-group form-float row" >
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
                <span style="color: red " class="image text-user hidden"></span>
            </div>
        </div>
    </div>

    <div class="col-md-10">
        
        @if( isset($user) && $user->image )
            <img id="changeimage" src="{{asset('img/'.$user->image)}}" width="100px" height="100px" alt=" {{trans('admin.image')}}" />
        @else 
            <img id="changeimage" src="{{asset('images/default.png')}}" width="100px" height="100px" alt=" {{trans('admin.image')}}" />
        @endif
    </div>
</div>

<div class="form-group">
    <div class="radio inlineblock m-r-20">
        <input type="radio" name="status" id="active" class="with-gap" value="active" <?php echo ( isset($user) && $user->status == 'active') ? "checked=''" : "";  ?>{{ !isset($user) ?  "checked=''" : '' }} >
        <label for="active">{{__('admin.active')}}</label>
    </div>                                
    <div class="radio inlineblock">
        <input type="radio" name="status" id="not_active" class="with-gap" value="not_active" <?php echo (  isset($user) && $user->status == 'not_active') ? "checked=''" : ""; ?> >
        <label for="not_active">{{__('admin.not_active')}}</label>
    </div>
</div>

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
                url: '{{ URL::route("storeuser") }}',
                data:  new FormData($("#form_validation")[0]),
                processData: false,
                contentType: false,
                
                success: function(data) {
                    if ((data.errors)) {                        
                            if (data.errors.country_id) {
                                $('#country_id-error').css('display', 'inline-block');
                                $('#country_id-error').text(data.errors.country_id);
                            }
                            if (data.errors.name) {
                                $('#name-error').css('display', 'inline-block');
                                $('#name-error').text(data.errors.name);
                            }
                            if (data.errors.mobile) {
                                $('#mobile-error').css('display', 'inline-block');
                                $('#mobile-error').text(data.errors.mobile);
                            }
                            if (data.errors.email) {
                                $('#email-error').css('display', 'inline-block');
                                $('#email-error').text(data.errors.email);
                            }
                            if (data.errors.image) {
                                $('#image-error').css('display', 'inline-block');
                                $('#image-error').text(data.errors.image);
                            }
                    } else {
                            {{-- window.location.replace("{{route('users')}}"); --}}

                        }
                },
            });
        });
    
    </script>

@endsection

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

    @if($lang == 'ar')
    <style>
        .dtp ,.datetimepicker, .join_date{
            direction: ltr !important ;
            border-radius: 0 30px 30px 0 !important;
        }

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