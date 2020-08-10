<?php

namespace App\Http\Requests;

use App\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
            ],
            'email'     => [
                'required',
            ],
            'phone'     => [
                'string',
                'nullable',
            ],
            'birthday'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'credit'    => [
                'required',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
