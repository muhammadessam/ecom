@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.address.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.addresses.update", [$address->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.address.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}" {{ ($address->customer ? $address->customer->id : old('customer_id')) == $id ? 'selected' : '' }}>{{ $customer }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="country_id">{{ trans('cruds.address.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id" required>
                    @foreach($countries as $id => $country)
                        <option value="{{ $id }}" {{ ($address->country ? $address->country->id : old('country_id')) == $id ? 'selected' : '' }}>{{ $country }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city_id">{{ trans('cruds.address.fields.city') }}</label>
                <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required>
                    @foreach($cities as $id => $city)
                        <option value="{{ $id }}" {{ ($address->city ? $address->city->id : old('city_id')) == $id ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="area_id">{{ trans('cruds.address.fields.area') }}</label>
                <select class="form-control select2 {{ $errors->has('area') ? 'is-invalid' : '' }}" name="area_id" id="area_id">
                    @foreach($areas as $id => $area)
                        <option value="{{ $id }}" {{ ($address->area ? $address->area->id : old('area_id')) == $id ? 'selected' : '' }}>{{ $area }}</option>
                    @endforeach
                </select>
                @if($errors->has('area'))
                    <span class="text-danger">{{ $errors->first('area') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lat">{{ trans('cruds.address.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="number" name="lat" id="lat" value="{{ old('lat', $address->lat) }}" step="0.01">
                @if($errors->has('lat'))
                    <span class="text-danger">{{ $errors->first('lat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="long">{{ trans('cruds.address.fields.long') }}</label>
                <input class="form-control {{ $errors->has('long') ? 'is-invalid' : '' }}" type="number" name="long" id="long" value="{{ old('long', $address->long) }}" step="0.01">
                @if($errors->has('long'))
                    <span class="text-danger">{{ $errors->first('long') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.long_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="details">{{ trans('cruds.address.fields.details') }}</label>
                <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details">{{ old('details', $address->details) }}</textarea>
                @if($errors->has('details'))
                    <span class="text-danger">{{ $errors->first('details') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.details_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.address.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $address->phone) }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alter_phone">{{ trans('cruds.address.fields.alter_phone') }}</label>
                <input class="form-control {{ $errors->has('alter_phone') ? 'is-invalid' : '' }}" type="text" name="alter_phone" id="alter_phone" value="{{ old('alter_phone', $address->alter_phone) }}">
                @if($errors->has('alter_phone'))
                    <span class="text-danger">{{ $errors->first('alter_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.alter_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.address.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $address->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="block">{{ trans('cruds.address.fields.block') }}</label>
                <input class="form-control {{ $errors->has('block') ? 'is-invalid' : '' }}" type="text" name="block" id="block" value="{{ old('block', $address->block) }}">
                @if($errors->has('block'))
                    <span class="text-danger">{{ $errors->first('block') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.block_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gada">{{ trans('cruds.address.fields.gada') }}</label>
                <input class="form-control {{ $errors->has('gada') ? 'is-invalid' : '' }}" type="text" name="gada" id="gada" value="{{ old('gada', $address->gada) }}">
                @if($errors->has('gada'))
                    <span class="text-danger">{{ $errors->first('gada') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.gada_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="street">{{ trans('cruds.address.fields.street') }}</label>
                <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', $address->street) }}">
                @if($errors->has('street'))
                    <span class="text-danger">{{ $errors->first('street') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.street_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="building">{{ trans('cruds.address.fields.building') }}</label>
                <input class="form-control {{ $errors->has('building') ? 'is-invalid' : '' }}" type="text" name="building" id="building" value="{{ old('building', $address->building) }}">
                @if($errors->has('building'))
                    <span class="text-danger">{{ $errors->first('building') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.building_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="floor">{{ trans('cruds.address.fields.floor') }}</label>
                <input class="form-control {{ $errors->has('floor') ? 'is-invalid' : '' }}" type="text" name="floor" id="floor" value="{{ old('floor', $address->floor) }}">
                @if($errors->has('floor'))
                    <span class="text-danger">{{ $errors->first('floor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.floor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="flat_house">{{ trans('cruds.address.fields.flat_house') }}</label>
                <input class="form-control {{ $errors->has('flat_house') ? 'is-invalid' : '' }}" type="text" name="flat_house" id="flat_house" value="{{ old('flat_house', $address->flat_house) }}">
                @if($errors->has('flat_house'))
                    <span class="text-danger">{{ $errors->first('flat_house') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.flat_house_helper') }}</span>
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