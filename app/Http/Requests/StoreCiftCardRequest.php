<?php

namespace App\Http\Requests;

use App\CiftCard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCiftCardRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cift_card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code'   => [
                'string',
                'required',
            ],
            'amount' => [
                'required',
            ],
        ];
    }
}
