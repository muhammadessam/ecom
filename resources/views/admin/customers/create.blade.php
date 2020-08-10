@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.customer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.customer.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.customer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.customer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.customer.fields.gender') }}</label>
                @foreach(App\Customer::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birthday">{{ trans('cruds.customer.fields.birthday') }}</label>
                <input class="form-control date {{ $errors->has('birthday') ? 'is-invalid' : '' }}" type="text" name="birthday" id="birthday" value="{{ old('birthday') }}">
                @if($errors->has('birthday'))
                    <span class="text-danger">{{ $errors->first('birthday') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.birthday_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="credit">{{ trans('cruds.customer.fields.credit') }}</label>
                <input class="form-control {{ $errors->has('credit') ? 'is-invalid' : '' }}" type="number" name="credit" id="credit" value="{{ old('credit', '0') }}" step="0.01" required>
                @if($errors->has('credit'))
                    <span class="text-danger">{{ $errors->first('credit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.credit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="img">{{ trans('cruds.customer.fields.img') }}</label>
                <div class="needsclick dropzone {{ $errors->has('img') ? 'is-invalid' : '' }}" id="img-dropzone">
                </div>
                @if($errors->has('img'))
                    <span class="text-danger">{{ $errors->first('img') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.img_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" required {{ old('is_active', 0) == 1 || old('is_active') === null ? 'checked' : '' }}>
                    <label class="required form-check-label" for="is_active">{{ trans('cruds.customer.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.is_active_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_mail_verified') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_mail_verified" value="0">
                    <input class="form-check-input" type="checkbox" name="is_mail_verified" id="is_mail_verified" value="1" {{ old('is_mail_verified', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_mail_verified">{{ trans('cruds.customer.fields.is_mail_verified') }}</label>
                </div>
                @if($errors->has('is_mail_verified'))
                    <span class="text-danger">{{ $errors->first('is_mail_verified') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.is_mail_verified_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_phone_verified') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_phone_verified" value="0">
                    <input class="form-check-input" type="checkbox" name="is_phone_verified" id="is_phone_verified" value="1" {{ old('is_phone_verified', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_phone_verified">{{ trans('cruds.customer.fields.is_phone_verified') }}</label>
                </div>
                @if($errors->has('is_phone_verified'))
                    <span class="text-danger">{{ $errors->first('is_phone_verified') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.is_phone_verified_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_newletter_subscription') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_newletter_subscription" value="0">
                    <input class="form-check-input" type="checkbox" name="is_newletter_subscription" id="is_newletter_subscription" value="1" {{ old('is_newletter_subscription', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_newletter_subscription">{{ trans('cruds.customer.fields.is_newletter_subscription') }}</label>
                </div>
                @if($errors->has('is_newletter_subscription'))
                    <span class="text-danger">{{ $errors->first('is_newletter_subscription') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.is_newletter_subscription_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_sms_subscription') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_sms_subscription" value="0">
                    <input class="form-check-input" type="checkbox" name="is_sms_subscription" id="is_sms_subscription" value="1" {{ old('is_sms_subscription', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_sms_subscription">{{ trans('cruds.customer.fields.is_sms_subscription') }}</label>
                </div>
                @if($errors->has('is_sms_subscription'))
                    <span class="text-danger">{{ $errors->first('is_sms_subscription') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.is_sms_subscription_helper') }}</span>
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
    url: '{{ route('admin.customers.storeMedia') }}',
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
@if(isset($customer) && $customer->img)
      var file = {!! json_encode($customer->img) !!}
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
@endsection