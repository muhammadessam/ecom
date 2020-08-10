@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.currency.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.currencies.update", [$currency->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.currency.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $currency->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currency.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.currency.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $currency->code) }}" required>
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currency.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="symbol">{{ trans('cruds.currency.fields.symbol') }}</label>
                <input class="form-control {{ $errors->has('symbol') ? 'is-invalid' : '' }}" type="text" name="symbol" id="symbol" value="{{ old('symbol', $currency->symbol) }}">
                @if($errors->has('symbol'))
                    <span class="text-danger">{{ $errors->first('symbol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currency.fields.symbol_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country_id">{{ trans('cruds.currency.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                    @foreach($countries as $id => $country)
                        <option value="{{ $id }}" {{ ($currency->country ? $currency->country->id : old('country_id')) == $id ? 'selected' : '' }}>{{ $country }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currency.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="exchange_rate">{{ trans('cruds.currency.fields.exchange_rate') }}</label>
                <input class="form-control {{ $errors->has('exchange_rate') ? 'is-invalid' : '' }}" type="number" name="exchange_rate" id="exchange_rate" value="{{ old('exchange_rate', $currency->exchange_rate) }}" step="0.01">
                @if($errors->has('exchange_rate'))
                    <span class="text-danger">{{ $errors->first('exchange_rate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currency.fields.exchange_rate_helper') }}</span>
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