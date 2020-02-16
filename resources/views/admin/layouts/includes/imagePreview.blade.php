
<input class="form-control {{ $errors->first($name) ? 'is-invalid' : '' }}" id="{{ $name }}" type="file"
 name="{{ $name }}" onchange="readURL(this, '{{ $name }}-preview')" {{ isset($multiple) ? 'multiple' : '' }} >
 
<img src="{{ $value ? asset('img/'. $value) : asset('img/no-image.png') }}" id="{{ $name }}-preview" class="mt-2 img-fluid img-thumbnail">
