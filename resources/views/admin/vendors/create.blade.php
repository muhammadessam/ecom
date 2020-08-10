@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.vendor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vendors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.vendor.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.vendor.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.vendor.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.vendor.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="img">{{ trans('cruds.vendor.fields.img') }}</label>
                <div class="needsclick dropzone {{ $errors->has('img') ? 'is-invalid' : '' }}" id="img-dropzone">
                </div>
                @if($errors->has('img'))
                    <span class="text-danger">{{ $errors->first('img') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.img_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about">{{ trans('cruds.vendor.fields.about') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('about') ? 'is-invalid' : '' }}" name="about" id="about">{!! old('about') !!}</textarea>
                @if($errors->has('about'))
                    <span class="text-danger">{{ $errors->first('about') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.about_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', 0) == 1 || old('is_active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">{{ trans('cruds.vendor.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.is_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commision_annual_price">{{ trans('cruds.vendor.fields.commision_annual_price') }}</label>
                <input class="form-control {{ $errors->has('commision_annual_price') ? 'is-invalid' : '' }}" type="number" name="commision_annual_price" id="commision_annual_price" value="{{ old('commision_annual_price', '') }}" step="0.01">
                @if($errors->has('commision_annual_price'))
                    <span class="text-danger">{{ $errors->first('commision_annual_price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.commision_annual_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="renew_commision_date">{{ trans('cruds.vendor.fields.renew_commision_date') }}</label>
                <input class="form-control date {{ $errors->has('renew_commision_date') ? 'is-invalid' : '' }}" type="text" name="renew_commision_date" id="renew_commision_date" value="{{ old('renew_commision_date') }}">
                @if($errors->has('renew_commision_date'))
                    <span class="text-danger">{{ $errors->first('renew_commision_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.renew_commision_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.vendor.fields.commision_type') }}</label>
                @foreach(App\Vendor::COMMISION_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('commision_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="commision_type_{{ $key }}" name="commision_type" value="{{ $key }}" {{ old('commision_type', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="commision_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('commision_type'))
                    <span class="text-danger">{{ $errors->first('commision_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.commision_type_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_knet_supported') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_knet_supported" value="0">
                    <input class="form-check-input" type="checkbox" name="is_knet_supported" id="is_knet_supported" value="1" {{ old('is_knet_supported', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_knet_supported">{{ trans('cruds.vendor.fields.is_knet_supported') }}</label>
                </div>
                @if($errors->has('is_knet_supported'))
                    <span class="text-danger">{{ $errors->first('is_knet_supported') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.is_knet_supported_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_cc_supported') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_cc_supported" value="0">
                    <input class="form-check-input" type="checkbox" name="is_cc_supported" id="is_cc_supported" value="1" {{ old('is_cc_supported', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_cc_supported">{{ trans('cruds.vendor.fields.is_cc_supported') }}</label>
                </div>
                @if($errors->has('is_cc_supported'))
                    <span class="text-danger">{{ $errors->first('is_cc_supported') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.is_cc_supported_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cover_img">{{ trans('cruds.vendor.fields.cover_img') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cover_img') ? 'is-invalid' : '' }}" id="cover_img-dropzone">
                </div>
                @if($errors->has('cover_img'))
                    <span class="text-danger">{{ $errors->first('cover_img') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.cover_img_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="minimum_charge">{{ trans('cruds.vendor.fields.minimum_charge') }}</label>
                <input class="form-control {{ $errors->has('minimum_charge') ? 'is-invalid' : '' }}" type="number" name="minimum_charge" id="minimum_charge" value="{{ old('minimum_charge', '') }}" step="0.01">
                @if($errors->has('minimum_charge'))
                    <span class="text-danger">{{ $errors->first('minimum_charge') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.minimum_charge_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.vendor.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', '') }}">
                @if($errors->has('website'))
                    <span class="text-danger">{{ $errors->first('website') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extra_info">{{ trans('cruds.vendor.fields.extra_info') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('extra_info') ? 'is-invalid' : '' }}" name="extra_info" id="extra_info">{!! old('extra_info') !!}</textarea>
                @if($errors->has('extra_info'))
                    <span class="text-danger">{{ $errors->first('extra_info') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.extra_info_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.vendor.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.vendor.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <span class="text-danger">{{ $errors->first('twitter') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.vendor.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                @if($errors->has('instagram'))
                    <span class="text-danger">{{ $errors->first('instagram') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.vendor.fields.linkedin') }}</label>
                <input class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', '') }}">
                @if($errors->has('linkedin'))
                    <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.linkedin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.vendor.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', '') }}">
                @if($errors->has('youtube'))
                    <span class="text-danger">{{ $errors->first('youtube') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pinterest">{{ trans('cruds.vendor.fields.pinterest') }}</label>
                <input class="form-control {{ $errors->has('pinterest') ? 'is-invalid' : '' }}" type="text" name="pinterest" id="pinterest" value="{{ old('pinterest', '') }}">
                @if($errors->has('pinterest'))
                    <span class="text-danger">{{ $errors->first('pinterest') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.pinterest_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="openning">{{ trans('cruds.vendor.fields.openning') }}</label>
                <input class="form-control timepicker {{ $errors->has('openning') ? 'is-invalid' : '' }}" type="text" name="openning" id="openning" value="{{ old('openning') }}">
                @if($errors->has('openning'))
                    <span class="text-danger">{{ $errors->first('openning') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.openning_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="closing">{{ trans('cruds.vendor.fields.closing') }}</label>
                <input class="form-control timepicker {{ $errors->has('closing') ? 'is-invalid' : '' }}" type="text" name="closing" id="closing" value="{{ old('closing') }}">
                @if($errors->has('closing'))
                    <span class="text-danger">{{ $errors->first('closing') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.closing_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_1">{{ trans('cruds.vendor.fields.phone_1') }}</label>
                <input class="form-control {{ $errors->has('phone_1') ? 'is-invalid' : '' }}" type="text" name="phone_1" id="phone_1" value="{{ old('phone_1', '') }}">
                @if($errors->has('phone_1'))
                    <span class="text-danger">{{ $errors->first('phone_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.phone_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_2">{{ trans('cruds.vendor.fields.phone_2') }}</label>
                <input class="form-control {{ $errors->has('phone_2') ? 'is-invalid' : '' }}" type="text" name="phone_2" id="phone_2" value="{{ old('phone_2', '') }}">
                @if($errors->has('phone_2'))
                    <span class="text-danger">{{ $errors->first('phone_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.phone_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_3">{{ trans('cruds.vendor.fields.phone_3') }}</label>
                <input class="form-control {{ $errors->has('phone_3') ? 'is-invalid' : '' }}" type="text" name="phone_3" id="phone_3" value="{{ old('phone_3', '') }}">
                @if($errors->has('phone_3'))
                    <span class="text-danger">{{ $errors->first('phone_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.phone_3_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.imgDropzone = {
    url: '{{ route('admin.vendors.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="img"]').remove()
      $('form').append('<input type="hidden" name="img" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="img"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($vendor) && $vendor->img)
      var file = {!! json_encode($vendor->img) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="img" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/vendors/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $vendor->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.coverImgDropzone = {
    url: '{{ route('admin.vendors.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="cover_img"]').remove()
      $('form').append('<input type="hidden" name="cover_img" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cover_img"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($vendor) && $vendor->cover_img)
      var file = {!! json_encode($vendor->cover_img) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cover_img" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection