<?php

namespace App\Http\Requests;

use App\GiftCardUsage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGiftCardUsageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gift_card_usage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'giftcard_id' => [
                'required',
                'integer',
            ],
            'customer_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
