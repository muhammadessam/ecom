<?php

namespace App\Http\Requests;

use App\ProductStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:product_statuses,id',
        ];
    }
}
