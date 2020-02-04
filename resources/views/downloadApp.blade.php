@extends('layouts.auth')
@section('style')
<style>
    .page-header-image
    {
        background-color: #364150!important;
    }
    body
    {
        {{-- font-family: 'DroidArabicKufiBold';   --}}
    }
    .card-plain
    {
        background-color:#eceef1;
         /* padding: 20px; */
    }
    .form-control:active,.form-control:focus {
        border: 1px solid #c3ccda;
    }
    .form-control {
        background-color: #dde3ec;
        height: 43px;
        color: #8290a3;
        border: 1px solid #dde3ec;
    }
    .btn.btn-primary{
        background-color:#0046B0;
        color: #FFF;
        {{-- font-family: 'DroidArabicKufiBold';   --}}
    }
    /* .btn.btn-primary:hover{
        color: #FFF;
        background-color: #1f858e;
        border-color: #18666d;
    } */
    h5>a.link
    {
        color:black!important;
    }
    span.input-group-addon
    {
        color:#cccccc !important;
    }
    .authentication .card-plain.card-plain .form-control,.authentication .card-plain.card-plain .form-control:focus
    {
        color: #000;
    }
    .invalid-feedback
    {
        color: #e73d4a;
    }
    body, .page-header{
        background-color: #364150   !important;
    }
    .delete-border{
        border-radius: 0px !important; 
    }
    .authentication .card-plain.card-plain .input-group-addon {

        background-color: #dde3ec !important; 
        border-color: rgb(255, 255, 255) !important;
        color: #fff;

    }
    ::placeholder {
        color: #a19ca3 !important;
        {{-- font-family: 'DroidArabicKufiRegular'; --}}
        text-align: right;
    }
</style>
@endsection
@section('content')


<div class="container" style="padding :20px ;">
    <div class="page-header-image" >
        <img src="{{ asset('images/logo.png') }}" alt="">
    </div>

    <div class="col-md-12 row m-0 content-center card-plain"  style="top: 50%;">
        <!-- <div class="card-plain"> -->
                <h5 class="alert alert-info col-12">حمل التطبيق الأن</h5>
                 <a href="https://play.google.com/store/apps/details?id=com.hala.tabe3" class="col-md-6 col-12 "><img src="{{ asset('images/googleplay.jpeg') }}" alt=""  > </a>
                 <a href="https://apps.apple.com/us/app/t-be3-تبيع/id1485303433?ls=1"  class="col-md-6 col-12 "><img src="{{ asset('images/appstore.jpeg') }}"  alt=""> ِ</a>
        <!-- </div> -->
    </div>
</div>
@endsection 


 