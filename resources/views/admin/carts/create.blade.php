@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.cart.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.carts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.cart.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $customer }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="coupon_id">{{ trans('cruds.cart.fields.coupon') }}</label>
                <select class="form-control select2 {{ $errors->has('coupon') ? 'is-invalid' : '' }}" name="coupon_id" id="coupon_id">
                    @foreach($coupons as $id => $coupon)
                        <option value="{{ $id }}" {{ old('coupon_id') == $id ? 'selected' : '' }}>{{ $coupon }}</option>
                    @endforeach
                </select>
                @if($errors->has('coupon'))
                    <span class="text-danger">{{ $errors->first('coupon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.coupon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.cart.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" step="0.01">
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount">{{ trans('cruds.cart.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', '') }}" step="0.01">
                @if($errors->has('discount'))
                    <span class="text-danger">{{ $errors->first('discount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="to_be_paid">{{ trans('cruds.cart.fields.to_be_paid') }}</label>
                <input class="form-control {{ $errors->has('to_be_paid') ? 'is-invalid' : '' }}" type="number" name="to_be_paid" id="to_be_paid" value="{{ old('to_be_paid', '') }}" step="0.01">
                @if($errors->has('to_be_paid'))
                    <span class="text-danger">{{ $errors->first('to_be_paid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.to_be_paid_helper') }}</span>
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