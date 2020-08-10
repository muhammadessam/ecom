@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.coupon.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.coupons.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.coupon.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code">{{ trans('cruds.coupon.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}">
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.coupon.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.coupon.fields.type') }}</label>
                @foreach(App\Coupon::TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.coupon.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number" name="value" id="value" value="{{ old('value', '') }}" step="0.01" required>
                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_free_shipping') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_free_shipping" id="is_free_shipping" value="1" required {{ old('is_free_shipping', 0) == 1 ? 'checked' : '' }}>
                    <label class="required form-check-label" for="is_free_shipping">{{ trans('cruds.coupon.fields.is_free_shipping') }}</label>
                </div>
                @if($errors->has('is_free_shipping'))
                    <span class="text-danger">{{ $errors->first('is_free_shipping') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.is_free_shipping_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_cat_id">{{ trans('cruds.coupon.fields.product_cat') }}</label>
                <select class="form-control select2 {{ $errors->has('product_cat') ? 'is-invalid' : '' }}" name="product_cat_id" id="product_cat_id">
                    @foreach($product_cats as $id => $product_cat)
                        <option value="{{ $id }}" {{ old('product_cat_id') == $id ? 'selected' : '' }}>{{ $product_cat }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_cat'))
                    <span class="text-danger">{{ $errors->first('product_cat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.product_cat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_usage">{{ trans('cruds.coupon.fields.total_usage') }}</label>
                <input class="form-control {{ $errors->has('total_usage') ? 'is-invalid' : '' }}" type="number" name="total_usage" id="total_usage" value="{{ old('total_usage', '') }}" step="1">
                @if($errors->has('total_usage'))
                    <span class="text-danger">{{ $errors->first('total_usage') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.total_usage_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="usage_per_user">{{ trans('cruds.coupon.fields.usage_per_user') }}</label>
                <input class="form-control {{ $errors->has('usage_per_user') ? 'is-invalid' : '' }}" type="number" name="usage_per_user" id="usage_per_user" value="{{ old('usage_per_user', '') }}" step="1">
                @if($errors->has('usage_per_user'))
                    <span class="text-danger">{{ $errors->first('usage_per_user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.usage_per_user_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" required {{ old('is_active', 0) == 1 || old('is_active') === null ? 'checked' : '' }}>
                    <label class="required form-check-label" for="is_active">{{ trans('cruds.coupon.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.is_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start">{{ trans('cruds.coupon.fields.start') }}</label>
                <input class="form-control datetime {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start') }}">
                @if($errors->has('start'))
                    <span class="text-danger">{{ $errors->first('start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end">{{ trans('cruds.coupon.fields.end') }}</label>
                <input class="form-control datetime {{ $errors->has('end') ? 'is-invalid' : '' }}" type="text" name="end" id="end" value="{{ old('end') }}">
                @if($errors->has('end'))
                    <span class="text-danger">{{ $errors->first('end') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="minimum_amount">{{ trans('cruds.coupon.fields.minimum_amount') }}</label>
                <input class="form-control {{ $errors->has('minimum_amount') ? 'is-invalid' : '' }}" type="number" name="minimum_amount" id="minimum_amount" value="{{ old('minimum_amount', '') }}" step="0.01">
                @if($errors->has('minimum_amount'))
                    <span class="text-danger">{{ $errors->first('minimum_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.minimum_amount_helper') }}</span>
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
                xhr.open('POST', '/admin/coupons/ckmedia', true);
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
                data.append('crud_id', {{ $coupon->id ?? 0 }});
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

@endsection