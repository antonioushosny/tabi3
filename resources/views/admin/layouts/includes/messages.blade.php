
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

@if (session()->has('status'))
<div class="alert alert-success text-sm-center">
	<button class="close" type="button" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<h6>{{ session('status') }}</h6>
</div>
@endif

@if (session()->has('status_danger'))
<div class="alert alert-danger text-sm-center">
	<button class="close" type="button" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<h6>{{ session('status_danger') }}</h6>
</div>
@endif
