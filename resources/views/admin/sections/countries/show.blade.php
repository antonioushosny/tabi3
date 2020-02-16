@extends('admin::layouts.master')

@section('main')
  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">{{ __('admin::lang.home') }}</li>
      <li class="breadcrumb-item">
        <a href="{{ route('admin.countries.index') }}">{{ __('admin::lang.countries') }}</a>
      </li>
      <li class="breadcrumb-item  active">{{ __('admin::lang.show') }}</li>
    </ol>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('admin::lang.show') }}
          </div>
          <div class="card-body">
            
            <ul class="list-group">
            
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.id') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $country->countries_id }}</div>
                </div>
              </li>
            
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.name') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $country->translate(old('activeLocale', $locale))->countries_name }}</div>
                </div>
              </li>

              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.cities') }}</strong></div>
                  @foreach($country->cities as $city)
                    <div class="col-12 col-md-10">{{ $city->translate(old('activeLocale', $locale))->cities_name }}</div>
                  @endforeach
                </div>
              </li>
            
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.position') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $country->countries_position }}</div>
                </div>
              </li>
             
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.status') }}</strong></div>
                  <div class="col-12 col-md-10">{{ __('admin::lang.status_'. $country->countries_status) }}</div>
                </div>
              </li>


            </ul>
          </div>
          <div class="card-footer">
            @can('view countries')
              <a href="{{ route('admin.countries.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-arrow-left"></i>
              </a>
            @endcan
            @can('update countries')
              <a href="{{ route('admin.countries.edit', [$country->countries_id, 'activeLocale' => old('activeLocale', $locale)]) }}" class="btn btn-sm btn-warning">
                <i class="fa fa-edit"></i>
              </a>
            @endcan
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
