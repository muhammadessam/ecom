<?php

namespace App\Http\Requests;

use App\Address;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddressRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'required',
                'integer',
            ],
            'country_id'  => [
                'required',
                'integer',
            ],
            'city_id'     => [
                'required',
                'integer',
            ],
            'lat'         => [
                'numeric',
            ],
            'long'        => [
                'numeric',
            ],
            'phone'       => [
                'string',
                'nullable',
            ],
            'alter_phone' => [
                'string',
                'nullable',
            ],
            'name'        => [
                'string',
                'nullable',
            ],
            'block'       => [
                'string',
                'nullable',
            ],
            'gada'        => [
                'string',
                'nullable',
            ],
            'street'      => [
                'string',
                'nullable',
            ],
            'building'    => [
                'string',
                'nullable',
            ],
            'floor'       => [
                'string',
                'nullable',
            ],
            'flat_house'  => [
                'string',
                'nullable',
            ],
        ];
    }
}
