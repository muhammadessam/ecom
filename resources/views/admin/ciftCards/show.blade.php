@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ciftCard.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gift-cards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ciftCard.fields.id') }}
                        </th>
                        <td>
                            {{ $giftCard->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ciftCard.fields.code') }}
                        </th>
                        <td>
                            {{ $giftCard->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ciftCard.fields.category') }}
                        </th>
                        <td>
                            {{ $giftCard->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ciftCard.fields.amount') }}
                        </th>
                        <td>
                            {{ $giftCard->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ciftCard.fields.message') }}
                        </th>
                        <td>
                            {{ $giftCard->message }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gift-cards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
