<?php

namespace App\Http\Requests;

use App\ProductAttributeValue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductAttributeValueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_attribute_value_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'value'        => [
                'string',
                'required',
            ],
            'attribute_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
