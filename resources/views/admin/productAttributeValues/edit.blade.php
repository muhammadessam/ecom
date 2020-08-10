@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productAttributeValue.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-attribute-values.update", [$productAttributeValue->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.productAttributeValue.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', $productAttributeValue->value) }}" required>
                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productAttributeValue.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="attribute_id">{{ trans('cruds.productAttributeValue.fields.attribute') }}</label>
                <select class="form-control select2 {{ $errors->has('attribute') ? 'is-invalid' : '' }}" name="attribute_id" id="attribute_id" required>
                    @foreach($attributes as $id => $attribute)
                        <option value="{{ $id }}" {{ ($productAttributeValue->attribute ? $productAttributeValue->attribute->id : old('attribute_id')) == $id ? 'selected' : '' }}>{{ $attribute }}</option>
                    @endforeach
                </select>
                @if($errors->has('attribute'))
                    <span class="text-danger">{{ $errors->first('attribute') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productAttributeValue.fields.attribute_helper') }}</span>
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