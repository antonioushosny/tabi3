@extends('admin.layouts.master')

@section('main')
  <main class="main">
  	{{-- Breadcrumb Section --}}
    <ol class="breadcrumb">
      <li class="breadcrumb-item">{{ __('lang.home') }}</li>
      <li class="breadcrumb-item  active">{{ __('lang.admins') }}</li>
    </ol>
    <div class="container-fluid">
      <div class="animated fadeIn">
      	@include('admin.layouts.includes.messages')

      	{{-- Search Section --}}
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal" action="{{ route('admins') }}" method="get">
              <div class="row">
                <div class="form-group col-12 col-md-1 text-center">
	                <a href="{{ route('addadmin') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                </div>
                <div class="form-group col-12 col-md-4 text-center">
                  <input class="form-control" type="text" name="name" placeholder="{{ __('lang.name') }}" value="{{ old('name') }}">
                </div>
                <div class="form-group col-12 col-md-3 text-center">
                  <input class="form-control" type="text" name="email" placeholder="{{ __('lang.email') }}" value="{{ old('email') }}">
                </div>
                <div class="form-group col-12 col-md-2 text-center">
						      <select class="form-control" name="status">
						        <option value="">{{ __('lang.selectStatus') }}</option>
						        <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>{{ __('lang.active') }}</option>
						        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>{{ __('lang.stopped') }}</option>
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
          		<div class="col-12 col-md-1 text-center"><strong>{{ __('lang.id') }}</strong></div>
          		<div class="col-12 col-md-4 text-center"><strong>{{ __('lang.name') }}</strong></div>
          		<div class="col-12 col-md-3 text-center"><strong>{{ __('lang.email') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('lang.status') }}</strong></div>
          		<div class="col-12 col-md-2 text-center"><strong>{{ __('lang.actions') }}</strong></div>
          	</div>
          </div>
        </div>

      	{{-- Data Section --}}
		@forelse ($admins as $admin)
	        <div class="card">
	          <div class="card-body">
	          	<div class="row">
	          		<div class="col-xs-12 col-md-1 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('lang.id') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $admin->id }}</div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-4 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('lang.name') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $admin->name }}</div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-3 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('lang.email') }}</strong></div>
	          				<div class="col-8 col-md-12">{{ $admin->email }}</div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('lang.status') }}</strong></div>
	          				<div class="col-8 col-md-12">
	          					@if ($admin->status == 'active')
	          						<span class="badge badge-warning">{{ __('lang.active') }}</span>
	          					@else
	          						<span class="badge badge-secondary">{{ __('lang.stopped') }}</span>
	          					@endif
	          				</div>
	          			</div>
	          		</div>
	          		<div class="col-12 col-md-2 text-md-center">
	          			<div class="row mb-2 mb-md-0">
	          				<div class="col-4 d-block d-md-none"><strong>{{ __('lang.actions') }}</strong></div>
	          				<div class="col-8 col-md-12">
	          					<form method="POST" action="{{ route('destroyadmin', $admin->id) }}">
	          						@csrf
	          						@method('GET')
								
									<a href="{{ route('editadmin', $admin->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

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

				{{ $admins->links() }}
      </div>
    </div>
  </main>
@endsection
