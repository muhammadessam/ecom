<?php

namespace App\Http\Requests;

use App\Vendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVendorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'                 => [
                'string',
                'required',
            ],
            'email'                => [
                'required',
            ],
            'password'             => [
                'required',
            ],
            'phone'                => [
                'string',
                'nullable',
            ],
            'renew_commision_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'website'              => [
                'string',
                'nullable',
            ],
            'facebook'             => [
                'string',
                'nullable',
            ],
            'twitter'              => [
                'string',
                'nullable',
            ],
            'instagram'            => [
                'string',
                'nullable',
            ],
            'linkedin'             => [
                'string',
                'nullable',
            ],
            'youtube'              => [
                'string',
                'nullable',
            ],
            'pinterest'            => [
                'string',
                'nullable',
            ],
            'openning'             => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'closing'              => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'phone_1'              => [
                'string',
                'nullable',
            ],
            'phone_2'              => [
                'string',
                'nullable',
            ],
            'phone_3'              => [
                'string',
                'nullable',
            ],
        ];
    }
}
