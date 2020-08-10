@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.update", [$transaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.transaction.fields.type') }}</label>
                @foreach(App\Transaction::TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', $transaction->type) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.transaction.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $transaction->amount) }}" step="0.01">
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="order_id">{{ trans('cruds.transaction.fields.order') }}</label>
                <select class="form-control select2 {{ $errors->has('order') ? 'is-invalid' : '' }}" name="order_id" id="order_id">
                    @foreach($orders as $id => $order)
                        <option value="{{ $id }}" {{ ($transaction->order ? $transaction->order->id : old('order_id')) == $id ? 'selected' : '' }}>{{ $order }}</option>
                    @endforeach
                </select>
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method_id">{{ trans('cruds.transaction.fields.payment_method') }}</label>
                <select class="form-control select2 {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method_id" id="payment_method_id">
                    @foreach($payment_methods as $id => $payment_method)
                        <option value="{{ $id }}" {{ ($transaction->payment_method ? $transaction->payment_method->id : old('payment_method_id')) == $id ? 'selected' : '' }}>{{ $payment_method }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_method'))
                    <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="result">{{ trans('cruds.transaction.fields.result') }}</label>
                <input class="form-control {{ $errors->has('result') ? 'is-invalid' : '' }}" type="text" name="result" id="result" value="{{ old('result', $transaction->result) }}">
                @if($errors->has('result'))
                    <span class="text-danger">{{ $errors->first('result') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.result_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="postdate">{{ trans('cruds.transaction.fields.postdate') }}</label>
                <input class="form-control {{ $errors->has('postdate') ? 'is-invalid' : '' }}" type="text" name="postdate" id="postdate" value="{{ old('postdate', $transaction->postdate) }}">
                @if($errors->has('postdate'))
                    <span class="text-danger">{{ $errors->first('postdate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.postdate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tranid">{{ trans('cruds.transaction.fields.tranid') }}</label>
                <input class="form-control {{ $errors->has('tranid') ? 'is-invalid' : '' }}" type="text" name="tranid" id="tranid" value="{{ old('tranid', $transaction->tranid) }}">
                @if($errors->has('tranid'))
                    <span class="text-danger">{{ $errors->first('tranid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.tranid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auth">{{ trans('cruds.transaction.fields.auth') }}</label>
                <input class="form-control {{ $errors->has('auth') ? 'is-invalid' : '' }}" type="text" name="auth" id="auth" value="{{ old('auth', $transaction->auth) }}">
                @if($errors->has('auth'))
                    <span class="text-danger">{{ $errors->first('auth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.auth_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ref">{{ trans('cruds.transaction.fields.ref') }}</label>
                <input class="form-control {{ $errors->has('ref') ? 'is-invalid' : '' }}" type="text" name="ref" id="ref" value="{{ old('ref', $transaction->ref) }}">
                @if($errors->has('ref'))
                    <span class="text-danger">{{ $errors->first('ref') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.ref_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="trackid">{{ trans('cruds.transaction.fields.trackid') }}</label>
                <input class="form-control {{ $errors->has('trackid') ? 'is-invalid' : '' }}" type="text" name="trackid" id="trackid" value="{{ old('trackid', $transaction->trackid) }}">
                @if($errors->has('trackid'))
                    <span class="text-danger">{{ $errors->first('trackid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.trackid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="udf_1">{{ trans('cruds.transaction.fields.udf_1') }}</label>
                <input class="form-control {{ $errors->has('udf_1') ? 'is-invalid' : '' }}" type="text" name="udf_1" id="udf_1" value="{{ old('udf_1', $transaction->udf_1) }}">
                @if($errors->has('udf_1'))
                    <span class="text-danger">{{ $errors->first('udf_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.udf_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="udf_2">{{ trans('cruds.transaction.fields.udf_2') }}</label>
                <input class="form-control {{ $errors->has('udf_2') ? 'is-invalid' : '' }}" type="text" name="udf_2" id="udf_2" value="{{ old('udf_2', $transaction->udf_2) }}">
                @if($errors->has('udf_2'))
                    <span class="text-danger">{{ $errors->first('udf_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.udf_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="udf_3">{{ trans('cruds.transaction.fields.udf_3') }}</label>
                <input class="form-control {{ $errors->has('udf_3') ? 'is-invalid' : '' }}" type="text" name="udf_3" id="udf_3" value="{{ old('udf_3', $transaction->udf_3) }}">
                @if($errors->has('udf_3'))
                    <span class="text-danger">{{ $errors->first('udf_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.udf_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="udf_4">{{ trans('cruds.transaction.fields.udf_4') }}</label>
                <input class="form-control {{ $errors->has('udf_4') ? 'is-invalid' : '' }}" type="text" name="udf_4" id="udf_4" value="{{ old('udf_4', $transaction->udf_4) }}">
                @if($errors->has('udf_4'))
                    <span class="text-danger">{{ $errors->first('udf_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.udf_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="udf_5">{{ trans('cruds.transaction.fields.udf_5') }}</label>
                <input class="form-control {{ $errors->has('udf_5') ? 'is-invalid' : '' }}" type="text" name="udf_5" id="udf_5" value="{{ old('udf_5', $transaction->udf_5) }}">
                @if($errors->has('udf_5'))
                    <span class="text-danger">{{ $errors->first('udf_5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.udf_5_helper') }}</span>
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