<?php

namespace App\Http\Requests;

use App\Currency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:currencies,code,' . request()->route('currency')->id,
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
