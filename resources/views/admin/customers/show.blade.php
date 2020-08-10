@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.id') }}
                        </th>
                        <td>
                            {{ $customer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.name') }}
                        </th>
                        <td>
                            {{ $customer->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.email') }}
                        </th>
                        <td>
                            {{ $customer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.phone') }}
                        </th>
                        <td>
                            {{ $customer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Customer::GENDER_RADIO[$customer->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.birthday') }}
                        </th>
                        <td>
                            {{ $customer->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.credit') }}
                        </th>
                        <td>
                            {{ $customer->credit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.img') }}
                        </th>
                        <td>
                            @if($customer->img)
                                <a href="{{ $customer->img->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $customer->img->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $customer->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.is_mail_verified') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $customer->is_mail_verified ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.is_phone_verified') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $customer->is_phone_verified ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.is_newletter_subscription') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $customer->is_newletter_subscription ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.is_sms_subscription') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $customer->is_sms_subscription ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#customer_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.order.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer_carts" role="tab" data-toggle="tab">
                {{ trans('cruds.cart.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer_tickets" role="tab" data-toggle="tab">
                {{ trans('cruds.ticket.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="customer_orders">
            @includeIf('admin.customers.relationships.customerOrders', ['orders' => $customer->customerOrders])
        </div>
        <div class="tab-pane" role="tabpanel" id="customer_carts">
            @includeIf('admin.customers.relationships.customerCarts', ['carts' => $customer->customerCarts])
        </div>
        <div class="tab-pane" role="tabpanel" id="customer_tickets">
            @includeIf('admin.customers.relationships.customerTickets', ['tickets' => $customer->customerTickets])
        </div>
    </div>
</div>

@endsection