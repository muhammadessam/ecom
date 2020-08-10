<?php

namespace App\Http\Requests;

use App\ProductAttributeValue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductAttributeValueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_attribute_value_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:product_attribute_values,id',
        ];
    }
}
