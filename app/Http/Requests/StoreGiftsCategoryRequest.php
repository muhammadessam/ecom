<?php

namespace App\Http\Requests;

use App\GiftsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGiftsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gifts_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'   => [
                'string',
                'required',
            ],
            'amount' => [
                'required',
            ],
        ];
    }
}
