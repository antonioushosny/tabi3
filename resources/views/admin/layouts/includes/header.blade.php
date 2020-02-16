
@php
  $lang = session('lang');
  App::setLocale($lang);
  $lang = App::getlocale();
  if($lang == null){
      $lang ='ar';
  }
  $locale = $lang ;
   
  if($locale == 'ar'){
    $dir = 'rtl';
  }else{
    $dir = 'ltr';
  }
   
  $nav = $dir == 'ltr' ? 'ml-auto' : 'mr-auto';
  $dropdown = $dir == 'ltr' ? 'dropdown-menu-right' : 'dropdown-menu-left';

@endphp
<header class="app-header navbar">
  
  <div class="container-fluid row " >
        <button class="   navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class=" col-lg-1 col-md-2 navbar-brand" href="{{ route('home') }}">
          <img class="d-md-down-none" src="{{ asset($locale == 'ar' ? 'images/logo.png' : 'images/logo.png') }}" height="25" alt="AppLife">

          <img class="d-lg-none" src="{{ asset($locale == 'ar' ? 'images/logo.png' : 'images/logo.png') }}" height="30" alt="AppLife">
        </a>

        <div class="col-lg-10  col-md-8 row m-0 p-0 d-md-down-none">
          <ul class="nav navbar-nav d-md-down-none">
            
            {{-- Admins Links --}}
            <li class="nav-item px-3">
              <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                {{ __('admin.admins') }}
                <i class="fa fa-arrow-circle-down"></i>
              </a>

              <div class="dropdown-menu {{ $dropdown }}">

                {{-- Admins Link --}}

                <a class="dropdown-item" href="{{ route('admins') }}">
                  {{ __('admin.admins') }}
                </a>
            
              </div>
            </li>

            {{-- countries Links --}}
            <li class="nav-item px-3">
              <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                {{ __('admin.countries') }}
                <i class="fa fa-arrow-circle-down"></i>
              </a>

              <div class="dropdown-menu {{ $dropdown }}">

                {{-- countries Link --}}
                <a class="dropdown-item" href="{{ route('countries') }}">
                  {{ __('admin.countries') }}
                </a>

                {{-- cities Link --}}
                <a class="dropdown-item" href="{{ route('cities') }}">
                  {{ __('admin.cities') }}
                </a>

                {{-- areas Link --}}
                <a class="dropdown-item" href="{{ route('areas') }}">
                  {{ __('admin.areas') }}
                </a>

                {{-- locations Link --}}
                <a class="dropdown-item" href="{{ route('locations') }}">
                  {{ __('admin.locations') }}
                </a>
            
              </div>
            </li>

            {{-- categories Link --}}
            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('categories') }}" >
                  {{ __('admin.categories') }} 
                </a>
            </li>

              {{-- departments Link --}}
            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('departments') }}" >
                  {{ __('admin.departments') }}
                </a>
            </li>

            {{-- subcategories Link --}}
            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('subcategories') }}" >
                  {{ __('admin.subcategories') }}
                </a>
            </li>

              {{-- delegates Link --}}
            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('delegates') }}" >
                  {{ __('admin.delegates') }}
                </a>
            </li>

              {{-- payments Link --}}
            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('payments') }}" >
                  {{ __('admin.payments') }}
                </a>
            </li>

            {{-- advertisements Link --}}
            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('advertisements') }}" >
                  {{ __('admin.advertisements') }}
                </a>
            </li>
              
              {{-- advertisingAdvertisements Link --}}
            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('advertisingAdvertisements') }}" >
                  {{ __('admin.advertisingAdvertisements') }}
                </a>
            </li>

            {{-- users Link --}}
            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('users') }}" >
                  {{ __('admin.users') }}
                </a>
            </li>

            {{-- contacts Link --}}
            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('contacts') }}" >
                  {{ __('admin.contacts') }}
                </a>
            </li>
            
            {{-- settings Links --}}
            <li class="nav-item px-3">
              <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cogs"></i>
                {{ __('lang.settings') }}
                <i class="fa fa-arrow-circle-down"></i>
              </a>

              <div class="dropdown-menu {{ $dropdown }}">

                {{-- Admins Link --}}

                <a class="dropdown-item" href="{{ route('editsetting','about')  }}">
                  {{ __('admin.AboutUs') }}
                </a>

                <a class="dropdown-item" href="{{  route('editsetting','term') }}">
                  {{ __('admin.Terms') }}
                </a>

                <a class="dropdown-item" href="{{ route('editsetting','install')}}">
                  {{ __('admin.install_ads') }}
                </a>

                <a class="dropdown-item" href="{{ route('editsetting','star')}}">
                  {{ __('admin.star_ads') }}
                </a>

                <a class="dropdown-item" href="{{ route('editsetting','uploade_video')}}">
                  {{ __('admin.uploade_video') }}
                </a>

                <a class="dropdown-item" href="{{ route('messages')}}">
                  {{ __('admin.messages') }}
                </a>
            
              </div>
            </li>


          </ul>
        </div>

        <div class="col-lg-1 col-md-2 col-4 row m-0 p-0  ">

          <ul class="nav navbar-nav {{ $nav }}">
            <li class="nav-item d-md-down-none ">
              
              @php
                $NotLocale = $locale == 'ar' ? 'en' : 'ar';
              @endphp
              <a class="nav-link"
              href="{{route('setlang',['lang'=>$NotLocale])}}">
                <i class="icon-globe"></i>
                {{ __('lang.'. $NotLocale . '-inverse' ) }}
              </a>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link px-2" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="nav-icon icon-user"></i>
              </a>
              <div class="dropdown-menu {{ $dropdown }}">
                <div class="dropdown-header text-center">
                  <strong>{{ auth()->user()->name }}</strong>
                </div>
                <a class="dropdown-item" href=" ">
                  <i class="fa fa-user"></i> {{ __('lang.profile') }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}" data-close="true" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fa fa-lock"></i> {{ __('lang.logout') }}</a> 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>

  </div>

</header>
