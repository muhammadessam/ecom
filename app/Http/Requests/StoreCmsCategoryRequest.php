<?php

namespace App\Http\Requests;

use App\CmsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCmsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cms_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
