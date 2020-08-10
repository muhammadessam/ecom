@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customerDevice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-devices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customerDevice.fields.id') }}
                        </th>
                        <td>
                            {{ $customerDevice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerDevice.fields.type') }}
                        </th>
                        <td>
                            {{ App\CustomerDevice::TYPE_RADIO[$customerDevice->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerDevice.fields.token') }}
                        </th>
                        <td>
                            {{ $customerDevice->token }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerDevice.fields.ip') }}
                        </th>
                        <td>
                            {{ $customerDevice->ip }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-devices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection