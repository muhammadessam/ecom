@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.couponUsage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.coupon-usages.update", [$couponUsage->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="coupon_id">{{ trans('cruds.couponUsage.fields.coupon') }}</label>
                <select class="form-control select2 {{ $errors->has('coupon') ? 'is-invalid' : '' }}" name="coupon_id" id="coupon_id" required>
                    @foreach($coupons as $id => $coupon)
                        <option value="{{ $id }}" {{ ($couponUsage->coupon ? $couponUsage->coupon->id : old('coupon_id')) == $id ? 'selected' : '' }}>{{ $coupon }}</option>
                    @endforeach
                </select>
                @if($errors->has('coupon'))
                    <span class="text-danger">{{ $errors->first('coupon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.couponUsage.fields.coupon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.couponUsage.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}" {{ ($couponUsage->customer ? $couponUsage->customer->id : old('customer_id')) == $id ? 'selected' : '' }}>{{ $customer }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.couponUsage.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="order_id">{{ trans('cruds.couponUsage.fields.order') }}</label>
                <select class="form-control select2 {{ $errors->has('order') ? 'is-invalid' : '' }}" name="order_id" id="order_id">
                    @foreach($orders as $id => $order)
                        <option value="{{ $id }}" {{ ($couponUsage->order ? $couponUsage->order->id : old('order_id')) == $id ? 'selected' : '' }}>{{ $order }}</option>
                    @endforeach
                </select>
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.couponUsage.fields.order_helper') }}</span>
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