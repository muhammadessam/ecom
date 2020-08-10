@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productReview.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-reviews.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="good">{{ trans('cruds.productReview.fields.good') }}</label>
                <textarea class="form-control {{ $errors->has('good') ? 'is-invalid' : '' }}" name="good" id="good">{{ old('good') }}</textarea>
                @if($errors->has('good'))
                    <span class="text-danger">{{ $errors->first('good') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productReview.fields.good_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bad">{{ trans('cruds.productReview.fields.bad') }}</label>
                <textarea class="form-control {{ $errors->has('bad') ? 'is-invalid' : '' }}" name="bad" id="bad">{{ old('bad') }}</textarea>
                @if($errors->has('bad'))
                    <span class="text-danger">{{ $errors->first('bad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productReview.fields.bad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="review">{{ trans('cruds.productReview.fields.review') }}</label>
                <textarea class="form-control {{ $errors->has('review') ? 'is-invalid' : '' }}" name="review" id="review">{{ old('review') }}</textarea>
                @if($errors->has('review'))
                    <span class="text-danger">{{ $errors->first('review') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productReview.fields.review_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rate">{{ trans('cruds.productReview.fields.rate') }}</label>
                <input class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" type="number" name="rate" id="rate" value="{{ old('rate', '') }}" step="1">
                @if($errors->has('rate'))
                    <span class="text-danger">{{ $errors->first('rate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productReview.fields.rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.productReview.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productReview.fields.product_helper') }}</span>
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