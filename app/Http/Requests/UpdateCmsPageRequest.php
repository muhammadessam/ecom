<?php

namespace App\Http\Requests;

use App\CmsPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCmsPageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cms_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'question' => [
                'string',
                'nullable',
            ],
            'answer'   => [
                'string',
                'nullable',
            ],
        ];
    }
}
