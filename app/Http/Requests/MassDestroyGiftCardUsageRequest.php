<?php

namespace App\Http\Requests;

use App\GiftCardUsage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGiftCardUsageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gift_card_usage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gift_card_usages,id',
        ];
    }
}
