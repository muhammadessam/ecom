@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cartItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cart-items.update", [$cartItem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.cartItem.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ ($cartItem->product ? $cartItem->product->id : old('product_id')) == $id ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cartItem.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="count">{{ trans('cruds.cartItem.fields.count') }}</label>
                <input class="form-control {{ $errors->has('count') ? 'is-invalid' : '' }}" type="number" name="count" id="count" value="{{ old('count', $cartItem->count) }}" step="0.01" required>
                @if($errors->has('count'))
                    <span class="text-danger">{{ $errors->first('count') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cartItem.fields.count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.cartItem.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $cartItem->total) }}" step="0.01">
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cartItem.fields.total_helper') }}</span>
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