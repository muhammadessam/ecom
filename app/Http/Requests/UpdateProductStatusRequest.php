<?php

namespace App\Http\Requests;

use App\ProductStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
