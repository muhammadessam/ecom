<?php

namespace App\Http\Requests;

use App\CouponUsage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCouponUsageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('coupon_usage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'coupon_id'   => [
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
