
<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="nav-icon icon-home"></i> {{ __('lang.home') }}
        </a>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-language"></i> {{ __('lang.languages') }}</a>
        <ul class="nav-dropdown-items">
          
            <li class="nav-item">
              <a class="nav-link" href="{{ route('setlang',['lang'=>'ar'])}}">
                <i class="nav-icon icon-globe"></i> {{ __('lang.ar') }}</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('setlang',['lang'=>'en'])}}">
                <i class="nav-icon icon-globe"></i> {{ __('lang.en') }}</a>
            </li>
        
        </ul>
      </li>
      
        {{-- admins Links --}}
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-arrow-circle-down"></i> {{ __('lang.admins') }}</a>
          <ul class="nav-dropdown-items">

              {{-- admins Link --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admins') }}">
                  {{ __('lang.admins') }}</a>
              </li>
          
          </ul>
        </li>

        {{-- countries Links --}}
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-arrow-circle-down"></i> {{ __('admin.countries') }}</a>
          <ul class="nav-dropdown-items">

              {{-- countries Link --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('countries') }}">
                  {{ __('admin.countries') }}</a>
              </li>

              
              {{-- cities Link --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('cities') }}">
                  {{ __('admin.cities') }}</a>
              </li>

              
              {{-- areas Link --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('areas') }}">
                  {{ __('admin.areas') }}</a>
              </li>

              
              {{-- locations Link --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('locations') }}">
                  {{ __('admin.locations') }}</a>
              </li>
          
          </ul>
        </li>

        {{-- categories Link --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories') }}" >
              <i class="nav-icon fa fa-th-list"></i> {{ __('admin.categories') }}
            </a>
        </li>

        {{-- departments Link --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('departments') }}" >
              <i class="nav-icon fa fa-th-list"></i> {{ __('admin.departments') }}
            </a>
        </li>

        {{-- subcategories Link --}}
        <li class="nav-item">
          <a class="nav-link" href="{{ route('subcategories') }}" >
            <i class="nav-icon fa fa-th-list"></i> {{ __('admin.subcategories') }}
          </a>
        </li>

        {{-- delegates Link --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('delegates') }}" >
              <i class="nav-icon fa fa-th-list"></i> {{ __('admin.delegates') }}
            </a>
        </li>

        {{-- payments Link --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('payments') }}" >
              <i class="nav-icon fa fa-th-list"></i> {{ __('admin.payments') }}
            </a>
        </li>

        {{-- advertisements Link --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('advertisements') }}" >
              <i class="nav-icon fa fa-th-list"></i> {{ __('admin.advertisements') }}
            </a>
        </li>

        {{-- advertisingAdvertisements Link --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('advertisingAdvertisements') }}" >
              <i class="nav-icon fa fa-th-list"></i> {{ __('admin.advertisingAdvertisements') }}
            </a>
        </li>

        {{-- users Link --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users') }}" >
              <i class="nav-icon fa fa-th-list"></i> {{ __('admin.users') }}
            </a>
        </li>

        {{-- contacts Link --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contacts') }}" >
              <i class="nav-icon fa fa-th-list"></i> {{ __('admin.contacts') }}
            </a>
        </li>
        
        {{-- settings Links --}}
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-cogs"></i> {{ __('lang.settings') }}</a>
          <ul class="nav-dropdown-items">

              {{-- AboutUs Link --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('editsetting','about') }}">
                  {{ __('admin.AboutUs') }}</a>
              </li>

              {{-- Terms Link --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('editsetting','term') }}">
                  {{ __('admin.Terms') }}</a>
              </li>

              {{-- install_ads Link --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('editsetting','install') }}">
                  {{ __('admin.install_ads') }}</a>
              </li>

              {{-- AboutUs Link --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('editsetting','star') }}">
                  {{ __('admin.star_ads') }}</a>
              </li>

              {{-- uploade_video Link --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('editsetting','uploade_video') }}">
                  {{ __('admin.uploade_video') }}</a>
              </li>


              {{-- messages Link --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('messages') }}">
                  {{ __('admin.messages') }}</a>
              </li>
          
          </ul>
        </li>

    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
