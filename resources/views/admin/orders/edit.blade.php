@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="adress_id">{{ trans('cruds.order.fields.adress') }}</label>
                <select class="form-control select2 {{ $errors->has('adress') ? 'is-invalid' : '' }}" name="adress_id" id="adress_id" required>
                    @foreach($adresses as $id => $adress)
                        <option value="{{ $id }}" {{ ($order->adress ? $order->adress->id : old('adress_id')) == $id ? 'selected' : '' }}>{{ $adress }}</option>
                    @endforeach
                </select>
                @if($errors->has('adress'))
                    <span class="text-danger">{{ $errors->first('adress') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.adress_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.order.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}" {{ ($order->customer ? $order->customer->id : old('customer_id')) == $id ? 'selected' : '' }}>{{ $customer }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_id">{{ trans('cruds.order.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ ($order->status ? $order->status->id : old('status_id')) == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vendors">{{ trans('cruds.order.fields.vendor') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('vendors') ? 'is-invalid' : '' }}" name="vendors[]" id="vendors" multiple>
                    @foreach($vendors as $id => $vendor)
                        <option value="{{ $id }}" {{ (in_array($id, old('vendors', [])) || $order->vendors->contains($id)) ? 'selected' : '' }}>{{ $vendor }}</option>
                    @endforeach
                </select>
                @if($errors->has('vendors'))
                    <span class="text-danger">{{ $errors->first('vendors') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.vendor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shipping_frees">{{ trans('cruds.order.fields.shipping_frees') }}</label>
                <input class="form-control {{ $errors->has('shipping_frees') ? 'is-invalid' : '' }}" type="number" name="shipping_frees" id="shipping_frees" value="{{ old('shipping_frees', $order->shipping_frees) }}" step="0.01">
                @if($errors->has('shipping_frees'))
                    <span class="text-danger">{{ $errors->first('shipping_frees') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.shipping_frees_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="picked_at">{{ trans('cruds.order.fields.picked_at') }}</label>
                <input class="form-control datetime {{ $errors->has('picked_at') ? 'is-invalid' : '' }}" type="text" name="picked_at" id="picked_at" value="{{ old('picked_at', $order->picked_at) }}">
                @if($errors->has('picked_at'))
                    <span class="text-danger">{{ $errors->first('picked_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.picked_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delievered_at">{{ trans('cruds.order.fields.delievered_at') }}</label>
                <input class="form-control datetime {{ $errors->has('delievered_at') ? 'is-invalid' : '' }}" type="text" name="delievered_at" id="delievered_at" value="{{ old('delievered_at', $order->delievered_at) }}">
                @if($errors->has('delievered_at'))
                    <span class="text-danger">{{ $errors->first('delievered_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.delievered_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_price">{{ trans('cruds.order.fields.total_price') }}</label>
                <input class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" type="number" name="total_price" id="total_price" value="{{ old('total_price', $order->total_price) }}" step="0.01">
                @if($errors->has('total_price'))
                    <span class="text-danger">{{ $errors->first('total_price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount">{{ trans('cruds.order.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', $order->discount) }}" step="0.01">
                @if($errors->has('discount'))
                    <span class="text-danger">{{ $errors->first('discount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="to_be_paid">{{ trans('cruds.order.fields.to_be_paid') }}</label>
                <input class="form-control {{ $errors->has('to_be_paid') ? 'is-invalid' : '' }}" type="number" name="to_be_paid" id="to_be_paid" value="{{ old('to_be_paid', $order->to_be_paid) }}" step="0.01">
                @if($errors->has('to_be_paid'))
                    <span class="text-danger">{{ $errors->first('to_be_paid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.to_be_paid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="serial">{{ trans('cruds.order.fields.serial') }}</label>
                <input class="form-control {{ $errors->has('serial') ? 'is-invalid' : '' }}" type="number" name="serial" id="serial" value="{{ old('serial', $order->serial) }}" step="1">
                @if($errors->has('serial'))
                    <span class="text-danger">{{ $errors->first('serial') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.serial_helper') }}</span>
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