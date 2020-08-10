<?php

namespace App\Http\Requests;

use App\Reply;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReplyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reply_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ticket_id' => [
                'required',
                'integer',
            ],
            'reply'     => [
                'required',
            ],
        ];
    }
}
