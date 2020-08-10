@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.area.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.areas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.area.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.area.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shipping_frees">{{ trans('cruds.area.fields.shipping_frees') }}</label>
                <input class="form-control {{ $errors->has('shipping_frees') ? 'is-invalid' : '' }}" type="number" name="shipping_frees" id="shipping_frees" value="{{ old('shipping_frees', '') }}" step="0.01">
                @if($errors->has('shipping_frees'))
                    <span class="text-danger">{{ $errors->first('shipping_frees') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.area.fields.shipping_frees_helper') }}</span>
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