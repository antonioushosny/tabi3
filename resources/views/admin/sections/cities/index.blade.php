@extends('admin.layouts.master')

@section('main')
  <main class="main">
  	
  	{{-- Breadcrumb Section --}}
    <ol class="breadcrumb">
      <li class="breadcrumb-item">{{ __('lang.home') }}</li>
      <li class="breadcrumb-item  active">{{ __('lang.cities') }}</li>
    </ol>

    <div class="container-fluid">
      <div class="animated fadeIn">

      	{{-- Operations Messages --}}
      	@include('admin.layouts.includes.messages')

      	{{-- Search Section --}}
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal" action="{{ route('cities') }}" method="get">
              <div class="row">
                <div class="form-group col-12 col-md-1 text-center">
	                <a href="{{ route('addcitie') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                </div>
                <div class="form-group col-12 col-md-1 text-center">
                </div>
                <div class="form-group col-12 col-md-3 text-center">
                  <input class="form-control" type="text" name="title_ar" placeholder="{{ __('admin.title_ar') }}" value="{{ old('title_ar') }}">
                </div>

				<div class="form-group col-12 col-md-3 text-center">
                  <input class="form-control" type="text" name="title_en" placeholder="{{ __('admin.title_en') }}" value="{{ old('title_en') }}">
                </div>

                <div class="form-group col-12 col-md-2 text-center">
						      <select class="form-control" name="status">
						        <option value="">{{ __('lang.selectStatus') }}</option>
						        <option value="active1" {{ old('status') === 'active' ? 'selected' : '' }}>{{ __('lang.active') }}</option>
						        <option value="not_active" {{ old('status') === 'not_active' ? 'selected' : '' }}>{{ __('lang.stopped') }}</option>
						      </select>
                </div>
                <div class="form-group col-12 col-md-2 text-center">
                	<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                	<button type="button" class="btn btn-secondary btn-sm search-reset"><i class="fa fa-ban"></i></button>
                </div>
              </div>
              <!-- /.row-->
            </form>
          </div>
        </div>

      	{{-- Header Section --}}
        <div class="card d-none d-md-block">
          <div class="card-header">
          	<div class="row">
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('lang.id') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin.country') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin.name_ar') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('admin.name_en') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('lang.status') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('lang.actions') }}</strong></div>
          	</div>
          </div>
        </div>

      	{{-- Data Section --}}
			@forelse ($cities as $city)
		        <div class="card {{ $loop->even ? 'even-record' : '' }}">
		          <div class="card-body">
		          	<div class="row">
		          		<div class="col-xs-12 col-md-2 text-md-center">
							<div class="row mb-2 mb-md-0">
								<div class="col-4 d-block d-md-none"><strong>{{ __('lang.id') }}</strong></div>
								<div class="col-8 col-md-12">{{ $city->id }}</div>
							</div>
		          		</div>

						<div class="col-12 col-md-2 text-md-center">
		          			<div class="row mb-2 mb-md-0">
		          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin.country') }}</strong></div>
		          				<div class="col-8 col-md-12">{{ $lang == 'ar' ? $city->country->title_ar : $city->country->title_en }}</div>
		          			</div>
		          		</div>


		          		<div class="col-12 col-md-2 text-md-center">
		          			<div class="row mb-2 mb-md-0">
		          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin.title_ar') }}</strong></div>
		          				<div class="col-8 col-md-12">{{ $city->title_ar }}</div>
		          			</div>
		          		</div>

						<div class="col-12 col-md-2 text-md-center">
		          			<div class="row mb-2 mb-md-0">
		          				<div class="col-4 d-block d-md-none"><strong>{{ __('admin.title_en') }}</strong></div>
		          				<div class="col-8 col-md-12">{{ $city->title_en }}</div>
		          			</div>
		          		</div>

					 
						
		          		<div class="col-12 col-md-2 text-md-center">
							<div class="row mb-2 mb-md-0">
								<div class="col-4 d-block d-md-none"><strong>{{ __('lang.status') }}</strong></div>
								<div class="col-8 col-md-12">
									@if ($city->status == 'active')
										<span class="badge badge-warning">{{ __('lang.active') }}</span>
									@else
										<span class="badge badge-secondary">{{ __('lang.stopped') }}</span>
									@endif
								</div>
							</div>
		          		</div>

		          		<div class="col-12 col-md-2">
		          			<div class="row mb-2 mb-md-0">
		          				<div class="col-4 d-block d-md-none"><strong>{{ __('lang.actions') }}</strong></div>
		          				<div class="col-8 col-md-12">
		          					<form method="POST" action="{{ route('destroycitie', $city->id) }}">
		          						@csrf
		          						@method('GET')
 
										<a href="{{ route('editcitie', $city->id) }}" 
											class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

										<button type="submit" class="btn btn-danger btn-sm delete-form">
											<i class="fa fa-trash"></i>
										</button>
 
		          					</form>
		          				</div>
		          			</div>
		          		</div>
		          	</div>
		          </div>
		        </div>
		         
        	 
				@empty
					<div class="card">
						<div class="card-body text-center text-danger">
							{{ __('lang.noData') }}
						</div>
					</div>
				@endforelse

				{{ $cities->links() }}
      </div>
    </div>
  </main>
@endsection
