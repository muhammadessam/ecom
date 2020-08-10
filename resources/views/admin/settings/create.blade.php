@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="store_name">{{ trans('cruds.setting.fields.store_name') }}</label>
                <input class="form-control {{ $errors->has('store_name') ? 'is-invalid' : '' }}" type="text" name="store_name" id="store_name" value="{{ old('store_name', '') }}">
                @if($errors->has('store_name'))
                    <span class="text-danger">{{ $errors->first('store_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.store_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="store_title">{{ trans('cruds.setting.fields.store_title') }}</label>
                <input class="form-control {{ $errors->has('store_title') ? 'is-invalid' : '' }}" type="text" name="store_title" id="store_title" value="{{ old('store_title', '') }}">
                @if($errors->has('store_title'))
                    <span class="text-danger">{{ $errors->first('store_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.store_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.setting.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.setting.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="e_mail">{{ trans('cruds.setting.fields.e_mail') }}</label>
                <input class="form-control {{ $errors->has('e_mail') ? 'is-invalid' : '' }}" type="email" name="e_mail" id="e_mail" value="{{ old('e_mail') }}">
                @if($errors->has('e_mail'))
                    <span class="text-danger">{{ $errors->first('e_mail') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.e_mail_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="receive_order_email">{{ trans('cruds.setting.fields.receive_order_email') }}</label>
                <input class="form-control {{ $errors->has('receive_order_email') ? 'is-invalid' : '' }}" type="email" name="receive_order_email" id="receive_order_email" value="{{ old('receive_order_email') }}">
                @if($errors->has('receive_order_email'))
                    <span class="text-danger">{{ $errors->first('receive_order_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.receive_order_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telephone">{{ trans('cruds.setting.fields.telephone') }}</label>
                <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="number" name="telephone" id="telephone" value="{{ old('telephone', '') }}" step="1">
                @if($errors->has('telephone'))
                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.telephone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.setting.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="number" name="mobile" id="mobile" value="{{ old('mobile', '') }}" step="1">
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.setting.fields.close_order') }}</label>
                @foreach(App\Setting::CLOSE_ORDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('close_order') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="close_order_{{ $key }}" name="close_order" value="{{ $key }}" {{ old('close_order', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="close_order_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('close_order'))
                    <span class="text-danger">{{ $errors->first('close_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.close_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ios_app_link">{{ trans('cruds.setting.fields.ios_app_link') }}</label>
                <input class="form-control {{ $errors->has('ios_app_link') ? 'is-invalid' : '' }}" type="text" name="ios_app_link" id="ios_app_link" value="{{ old('ios_app_link', '') }}">
                @if($errors->has('ios_app_link'))
                    <span class="text-danger">{{ $errors->first('ios_app_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.ios_app_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="android_app_link">{{ trans('cruds.setting.fields.android_app_link') }}</label>
                <input class="form-control {{ $errors->has('android_app_link') ? 'is-invalid' : '' }}" type="text" name="android_app_link" id="android_app_link" value="{{ old('android_app_link', '') }}">
                @if($errors->has('android_app_link'))
                    <span class="text-danger">{{ $errors->first('android_app_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.android_app_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.setting.fields.updateios') }}</label>
                @foreach(App\Setting::UPDATEIOS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('updateios') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="updateios_{{ $key }}" name="updateios" value="{{ $key }}" {{ old('updateios', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="updateios_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('updateios'))
                    <span class="text-danger">{{ $errors->first('updateios') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.updateios_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.setting.fields.updateandroid') }}</label>
                @foreach(App\Setting::UPDATEANDROID_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('updateandroid') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="updateandroid_{{ $key }}" name="updateandroid" value="{{ $key }}" {{ old('updateandroid', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="updateandroid_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('updateandroid'))
                    <span class="text-danger">{{ $errors->first('updateandroid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.updateandroid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iosupdatever">{{ trans('cruds.setting.fields.iosupdatever') }}</label>
                <input class="form-control {{ $errors->has('iosupdatever') ? 'is-invalid' : '' }}" type="text" name="iosupdatever" id="iosupdatever" value="{{ old('iosupdatever', '') }}">
                @if($errors->has('iosupdatever'))
                    <span class="text-danger">{{ $errors->first('iosupdatever') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.iosupdatever_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="androidupdatever">{{ trans('cruds.setting.fields.androidupdatever') }}</label>
                <input class="form-control {{ $errors->has('androidupdatever') ? 'is-invalid' : '' }}" type="text" name="androidupdatever" id="androidupdatever" value="{{ old('androidupdatever', '') }}">
                @if($errors->has('androidupdatever'))
                    <span class="text-danger">{{ $errors->first('androidupdatever') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.androidupdatever_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                @if($errors->has('instagram'))
                    <span class="text-danger">{{ $errors->first('instagram') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <span class="text-danger">{{ $errors->first('twitter') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.setting.fields.linkedin') }}</label>
                <input class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', '') }}">
                @if($errors->has('linkedin'))
                    <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.linkedin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pinterest">{{ trans('cruds.setting.fields.pinterest') }}</label>
                <input class="form-control {{ $errors->has('pinterest') ? 'is-invalid' : '' }}" type="text" name="pinterest" id="pinterest" value="{{ old('pinterest', '') }}">
                @if($errors->has('pinterest'))
                    <span class="text-danger">{{ $errors->first('pinterest') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.pinterest_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telegram">{{ trans('cruds.setting.fields.telegram') }}</label>
                <input class="form-control {{ $errors->has('telegram') ? 'is-invalid' : '' }}" type="text" name="telegram" id="telegram" value="{{ old('telegram', '') }}">
                @if($errors->has('telegram'))
                    <span class="text-danger">{{ $errors->first('telegram') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.telegram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="general_image_path">{{ trans('cruds.setting.fields.general_image_path') }}</label>
                <input class="form-control {{ $errors->has('general_image_path') ? 'is-invalid' : '' }}" type="text" name="general_image_path" id="general_image_path" value="{{ old('general_image_path', '') }}">
                @if($errors->has('general_image_path'))
                    <span class="text-danger">{{ $errors->first('general_image_path') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.general_image_path_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_image_path">{{ trans('cruds.setting.fields.product_image_path') }}</label>
                <input class="form-control {{ $errors->has('product_image_path') ? 'is-invalid' : '' }}" type="text" name="product_image_path" id="product_image_path" value="{{ old('product_image_path', '') }}">
                @if($errors->has('product_image_path'))
                    <span class="text-danger">{{ $errors->first('product_image_path') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.product_image_path_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vendor_image_path">{{ trans('cruds.setting.fields.vendor_image_path') }}</label>
                <input class="form-control {{ $errors->has('vendor_image_path') ? 'is-invalid' : '' }}" type="text" name="vendor_image_path" id="vendor_image_path" value="{{ old('vendor_image_path', '') }}">
                @if($errors->has('vendor_image_path'))
                    <span class="text-danger">{{ $errors->first('vendor_image_path') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.vendor_image_path_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slide_image_path">{{ trans('cruds.setting.fields.slide_image_path') }}</label>
                <input class="form-control {{ $errors->has('slide_image_path') ? 'is-invalid' : '' }}" type="text" name="slide_image_path" id="slide_image_path" value="{{ old('slide_image_path', '') }}">
                @if($errors->has('slide_image_path'))
                    <span class="text-danger">{{ $errors->first('slide_image_path') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.slide_image_path_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_video_path">{{ trans('cruds.setting.fields.product_video_path') }}</label>
                <input class="form-control {{ $errors->has('product_video_path') ? 'is-invalid' : '' }}" type="text" name="product_video_path" id="product_video_path" value="{{ old('product_video_path', '') }}">
                @if($errors->has('product_video_path'))
                    <span class="text-danger">{{ $errors->first('product_video_path') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.product_video_path_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category_image_path">{{ trans('cruds.setting.fields.category_image_path') }}</label>
                <input class="form-control {{ $errors->has('category_image_path') ? 'is-invalid' : '' }}" type="text" name="category_image_path" id="category_image_path" value="{{ old('category_image_path', '') }}">
                @if($errors->has('category_image_path'))
                    <span class="text-danger">{{ $errors->first('category_image_path') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.category_image_path_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_opening_time">{{ trans('cruds.setting.fields.start_opening_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('start_opening_time') ? 'is-invalid' : '' }}" type="text" name="start_opening_time" id="start_opening_time" value="{{ old('start_opening_time') }}">
                @if($errors->has('start_opening_time'))
                    <span class="text-danger">{{ $errors->first('start_opening_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.start_opening_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="close_openning_time">{{ trans('cruds.setting.fields.close_openning_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('close_openning_time') ? 'is-invalid' : '' }}" type="text" name="close_openning_time" id="close_openning_time" value="{{ old('close_openning_time') }}">
                @if($errors->has('close_openning_time'))
                    <span class="text-danger">{{ $errors->first('close_openning_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.close_openning_time_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 50, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->logo)
      var file = {!! json_encode($setting->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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