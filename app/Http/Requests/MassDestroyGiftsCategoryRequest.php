<?php

namespace App\Http\Requests;

use App\GiftsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGiftsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gifts_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gifts_categories,id',
        ];
    }
}
