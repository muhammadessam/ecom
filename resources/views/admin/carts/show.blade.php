@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cart.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cart.fields.id') }}
                        </th>
                        <td>
                            {{ $cart->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cart.fields.customer') }}
                        </th>
                        <td>
                            {{ $cart->customer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cart.fields.coupon') }}
                        </th>
                        <td>
                            {{ $cart->coupon->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cart.fields.total') }}
                        </th>
                        <td>
                            {{ $cart->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cart.fields.discount') }}
                        </th>
                        <td>
                            {{ $cart->discount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cart.fields.to_be_paid') }}
                        </th>
                        <td>
                            {{ $cart->to_be_paid }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection