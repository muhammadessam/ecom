<?php

namespace App\Http\Requests;

use App\Reply;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReplyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:replies,id',
        ];
    }
}
