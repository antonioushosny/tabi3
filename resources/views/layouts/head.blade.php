<!DOCTYPE html>
    <?php 
        $lang = session('lang');
        App::setLocale($lang);
        $lang = App::getlocale();
        if($lang == null) 
        {
            $lang ='ar';
        }
        if($title){
            $page = $title;
        }
        else {
            $page ='home';
        }

    ?>
    
<html lang="{{ session('lang')}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ trans('admin.nasebk')}}</title>
    
    <link rel="shortcut icon" href="{{ asset('images/nasebk.jpeg') }}" >
    
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('rtl/plugins/iCheck/square/blue.css') }}">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonynasebks">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonynasebks"></script>
    {{--  //for delete all selected  --}}
    <script language="JavaScript">
        function removeall(source) {
            checkboxes = document.getElementsByName('ids[]');
            for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
            }
        }
        var arrayimages = [];
        function animationHover(element, animation){
            element = $(element);
            element.hover(
                function() {
                    element.addClass('animated ' + animation);        
                },
                function(){
                    //wait for animation to finish before removing classes
                    window.setTimeout( function(){
                        element.removeClass('animated ' + animation);
                    }, 2000);         
                });
        }
        function readURL(input,imagediv) {
        
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                src = document.getElementById(imagediv).src;    
                imag = "{{asset('images/addimage.png')}}" ;
                if(imag != src){
                    arrayimages = src ;
                }
                console.log(arrayimages);
                reader.onload = function (e) {
                    $('#'+imagediv).attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURLs(input,imagediv) {

            {{-- $('#deleted_images').val()=  --}}
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#'+imagediv).attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]);
            }
           
        }
    </script>
   
    <script>
    
    langauge = "{{ session('lang')}}" ;
    localStorage.setItem("lang", "{{ session('lang')}}");
    lang = localStorage.getItem("lang");
    </script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('datatable/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
  <!-- <link href="{{ asset('fastselect/fastselect.min.css') }}" rel="stylesheet"> -->
  <!-- select2 -->
  @if($lang == 'ar')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('rtl/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('rtl/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('rtl/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ar.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('ltr/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ltr/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ltr/bower_components/Ionicons/css/ionicons.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('ltr/dist/css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('ltr/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/en.css') }}">
  @endif

  <!-- ... -->
  @yield('style') 
</head>