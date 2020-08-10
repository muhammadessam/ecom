@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vendor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.id') }}
                        </th>
                        <td>
                            {{ $vendor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.name') }}
                        </th>
                        <td>
                            {{ $vendor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.email') }}
                        </th>
                        <td>
                            {{ $vendor->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.phone') }}
                        </th>
                        <td>
                            {{ $vendor->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.img') }}
                        </th>
                        <td>
                            @if($vendor->img)
                                <a href="{{ $vendor->img->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $vendor->img->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.about') }}
                        </th>
                        <td>
                            {!! $vendor->about !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $vendor->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.commision_annual_price') }}
                        </th>
                        <td>
                            {{ $vendor->commision_annual_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.renew_commision_date') }}
                        </th>
                        <td>
                            {{ $vendor->renew_commision_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.commision_type') }}
                        </th>
                        <td>
                            {{ App\Vendor::COMMISION_TYPE_RADIO[$vendor->commision_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.is_knet_supported') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $vendor->is_knet_supported ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.is_cc_supported') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $vendor->is_cc_supported ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.cover_img') }}
                        </th>
                        <td>
                            @if($vendor->cover_img)
                                <a href="{{ $vendor->cover_img->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $vendor->cover_img->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.minimum_charge') }}
                        </th>
                        <td>
                            {{ $vendor->minimum_charge }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.website') }}
                        </th>
                        <td>
                            {{ $vendor->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.extra_info') }}
                        </th>
                        <td>
                            {!! $vendor->extra_info !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.facebook') }}
                        </th>
                        <td>
                            {{ $vendor->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.twitter') }}
                        </th>
                        <td>
                            {{ $vendor->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.instagram') }}
                        </th>
                        <td>
                            {{ $vendor->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $vendor->linkedin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.youtube') }}
                        </th>
                        <td>
                            {{ $vendor->youtube }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.pinterest') }}
                        </th>
                        <td>
                            {{ $vendor->pinterest }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.openning') }}
                        </th>
                        <td>
                            {{ $vendor->openning }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.closing') }}
                        </th>
                        <td>
                            {{ $vendor->closing }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.phone_1') }}
                        </th>
                        <td>
                            {{ $vendor->phone_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.phone_2') }}
                        </th>
                        <td>
                            {{ $vendor->phone_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.phone_3') }}
                        </th>
                        <td>
                            {{ $vendor->phone_3 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vendors.index') }}">
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
            <a class="nav-link" href="#vendor_brands" role="tab" data-toggle="tab">
                {{ trans('cruds.brand.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#vendor_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.order.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="vendor_brands">
            @includeIf('admin.vendors.relationships.vendorBrands', ['brands' => $vendor->vendorBrands])
        </div>
        <div class="tab-pane" role="tabpanel" id="vendor_orders">
            @includeIf('admin.vendors.relationships.vendorOrders', ['orders' => $vendor->vendorOrders])
        </div>
    </div>
</div>

@endsection