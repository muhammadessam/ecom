<?php

namespace App\Http\Requests;

use App\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'result'   => [
                'string',
                'nullable',
            ],
            'postdate' => [
                'string',
                'nullable',
            ],
            'tranid'   => [
                'string',
                'nullable',
            ],
            'auth'     => [
                'string',
                'nullable',
            ],
            'ref'      => [
                'string',
                'nullable',
            ],
            'trackid'  => [
                'string',
                'nullable',
            ],
            'udf_1'    => [
                'string',
                'nullable',
            ],
            'udf_2'    => [
                'string',
                'nullable',
            ],
            'udf_3'    => [
                'string',
                'nullable',
            ],
            'udf_4'    => [
                'string',
                'nullable',
            ],
            'udf_5'    => [
                'string',
                'nullable',
            ],
        ];
    }
}
