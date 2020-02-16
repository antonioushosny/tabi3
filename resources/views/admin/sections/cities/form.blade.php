
@php
  $activeLocale = old('activeLocale', 'general');
@endphp

<div class="card-body">
  @include('admin.layouts.includes.messages')
      <div class="row">

        <div class="col-lg-9">
          <div class="form-group row">
            <label class="col-md-3 col-form-label">{{ __('admin.title_ar') }}<span class="text-danger"> *</span></label>

            <div class="col-md-9">
              <input class="form-control {{ $errors->first('title_ar') ? 'is-invalid' : '' }}" type="text"
                name="title_ar" placeholder="{{ __('admin.title_ar') }}"
                value="{{ old('title_ar', isset($citie) ? $citie->title_ar : '') }}">
              @if ($errors->first('title_ar'))
                <div class="invalid-feedback">{{ $errors->first('title_ar') }}</div>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label">{{ __('admin.title_en') }}<span class="text-danger"> *</span></label>

            <div class="col-md-9">
              <input class="form-control {{ $errors->first('title_en') ? 'is-invalid' : '' }}" type="text"
                name="title_en" placeholder="{{ __('admin.title_en') }}"
                value="{{ old('title_en', isset($citie) ? $citie->title_en : '') }}">
              @if ($errors->first('title_en'))
                <div class="invalid-feedback">{{ $errors->first('title_en') }}</div>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label" for="image">{{ __('lang.img') }}<span class="text-danger"> *</span></label>
            <div class="col-md-9">
              @include('admin.layouts.includes.imagePreview', ['name' => 'image', 'value' => isset($citie) ? $citie->image : null])
              @if ($errors->first('image'))
                <div class="invalid-feedback">{{ $errors->first('image') }}</div>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 col-form-label">{{ __('lang.status') }}<span class="text-danger"> *</span></label>
            <div class="col-md-9 col-form-label">
              @php
                $status = old('status', isset($citie) ? $citie->status : 'active');
              @endphp
              <div class="form-check form-check-inline mr-1">
                <input class="form-check-input" id="active" type="radio" value="active" name="status" {{ $status == 'active' ? 'checked' : '' }}>
                <label class="form-check-label" for="active">{{ __('lang.active') }}</label>
              </div>
              <div class="form-check form-check-inline mr-1">
                <input class="form-check-input" id="stopped" type="radio" value="not_active" name="status" {{ $status == 'not_active' ? 'checked' : '' }}>
                <label class="form-check-label" for="stopped">{{ __('lang.stopped') }}</label>
              </div>
              @if ($errors->first('status'))
                <div class="invalid-feedback">{{ $errors->first('status') }}</div>
              @endif
            </div>
          </div>

        </div>
 
      </div>

 
   
 
   
 
</div>
