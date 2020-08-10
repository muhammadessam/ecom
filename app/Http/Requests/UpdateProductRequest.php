<?php

namespace App\Http\Requests;

use App\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'sku'              => [
                'string',
                'required',
                'unique:products,sku,' . request()->route('product')->id,
            ],
            'name'             => [
                'string',
                'required',
            ],
            'price'            => [
                'required',
            ],
            'categories.*'     => [
                'integer',
            ],
            'categories'       => [
                'array',
            ],
            'tags.*'           => [
                'integer',
            ],
            'tags'             => [
                'array',
            ],
            'model'            => [
                'string',
                'nullable',
            ],
            'slug'             => [
                'string',
                'nullable',
            ],
            'inventory_number' => [
                'string',
                'nullable',
            ],
            'meta_title'       => [
                'string',
                'nullable',
            ],
            'meta_keywords'    => [
                'string',
                'nullable',
            ],
            'meta_description' => [
                'string',
                'nullable',
            ],
            'vendor_id'        => [
                'required',
                'integer',
            ],
        ];
    }
}
