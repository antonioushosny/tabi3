@extends('admin.layouts.master')

@section('main')
  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">{{ __('lang.home') }}</li>
      <li class="breadcrumb-item">
        <a href="{{ route('admin.cities.index') }}">{{ __('lang.cities') }}</a>
      </li>
      <li class="breadcrumb-item  active">{{ __('lang.show') }}</li>
    </ol>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('lang.show') }}
          </div>
          <div class="card-body">
            
            <ul class="list-group">
            
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.id') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $city->cities_id }}</div>
                </div>
              </li>
            
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.name') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $city->translate(old('activeLocale', $locale))->cities_name }}</div>
                </div>
              </li>

              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('lang.cities') }}</strong></div>
                  @foreach($city->cities as $city)
                    <div class="col-12 col-md-10">{{ $city->translate(old('activeLocale', $locale))->cities_name }}</div>
                  @endforeach
                </div>
              </li>
            
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.position') }}</strong></div>
                  <div class="col-12 col-md-10">{{ $city->cities_position }}</div>
                </div>
              </li>
             
              <li class="list-group-item">
                <div class="row">
                  <div class="col-12 col-md-2"><strong>{{ __('admin::lang.status') }}</strong></div>
                  <div class="col-12 col-md-10">{{ __('admin::lang.status_'. $city->cities_status) }}</div>
                </div>
              </li>


            </ul>
          </div>
          <div class="card-footer">
            @can('view cities')
              <a href="{{ route('admin.cities.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-arrow-left"></i>
              </a>
            @endcan
            @can('update cities')
              <a href="{{ route('admin.cities.edit', [$city->cities_id, 'activeLocale' => old('activeLocale', $locale)]) }}" class="btn btn-sm btn-warning">
                <i class="fa fa-edit"></i>
              </a>
            @endcan
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
