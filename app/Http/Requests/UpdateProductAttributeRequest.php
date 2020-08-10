<?php

namespace App\Http\Requests;

use App\ProductAttribute;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductAttributeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_attribute_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
