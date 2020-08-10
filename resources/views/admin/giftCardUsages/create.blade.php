@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.giftCardUsage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gift-card-usages.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="giftcard_id">{{ trans('cruds.giftCardUsage.fields.giftcard') }}</label>
                <select class="form-control select2 {{ $errors->has('giftcard') ? 'is-invalid' : '' }}" name="giftcard_id" id="giftcard_id" required>
                    @foreach($giftcards as $id => $giftcard)
                        <option value="{{ $id }}" {{ old('giftcard_id') == $id ? 'selected' : '' }}>{{ $giftcard }}</option>
                    @endforeach
                </select>
                @if($errors->has('giftcard'))
                    <span class="text-danger">{{ $errors->first('giftcard') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.giftCardUsage.fields.giftcard_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.giftCardUsage.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $customer }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.giftCardUsage.fields.customer_helper') }}</span>
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