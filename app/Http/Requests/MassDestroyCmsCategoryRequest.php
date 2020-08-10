<?php

namespace App\Http\Requests;

use App\CmsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCmsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cms_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cms_categories,id',
        ];
    }
}
