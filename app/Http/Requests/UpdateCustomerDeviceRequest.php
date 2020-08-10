<?php

namespace App\Http\Requests;

use App\CustomerDevice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerDeviceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_device_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'token' => [
                'string',
                'nullable',
            ],
            'ip'    => [
                'string',
                'nullable',
            ],
        ];
    }
}
