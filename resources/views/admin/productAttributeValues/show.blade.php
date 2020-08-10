@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productAttributeValue.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-attribute-values.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productAttributeValue.fields.id') }}
                        </th>
                        <td>
                            {{ $productAttributeValue->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productAttributeValue.fields.value') }}
                        </th>
                        <td>
                            {{ $productAttributeValue->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productAttributeValue.fields.attribute') }}
                        </th>
                        <td>
                            {{ $productAttributeValue->attribute->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-attribute-values.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection