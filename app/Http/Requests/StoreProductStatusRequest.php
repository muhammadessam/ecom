<?php

namespace App\Http\Requests;

use App\ProductStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'status' => [
                'string',
                'required',
            ],
        ];
    }
}
