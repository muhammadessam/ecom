<?php

namespace App\Http\Requests;

use App\OrderItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderItemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('order_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'count'      => [
                'numeric',
            ],
        ];
    }
}
