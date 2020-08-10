<?php

namespace App\Http\Requests;

use App\Currency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('currency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'          => [
                'string',
                'required',
            ],
            'code'          => [
                'string',
                'required',
                'unique:currencies',
            ],
            'symbol'        => [
                'string',
                'nullable',
            ],
            'exchange_rate' => [
                'numeric',
            ],
        ];
    }
}
