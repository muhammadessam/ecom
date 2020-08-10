<?php

namespace App\Http\Requests;

use App\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'store_name'          => [
                'string',
                'nullable',
            ],
            'store_title'         => [
                'string',
                'nullable',
            ],
            'address'             => [
                'string',
                'nullable',
            ],
            'telephone'           => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'mobile'              => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ios_app_link'        => [
                'string',
                'nullable',
            ],
            'android_app_link'    => [
                'string',
                'nullable',
            ],
            'iosupdatever'        => [
                'string',
                'nullable',
            ],
            'androidupdatever'    => [
                'string',
                'nullable',
            ],
            'facebook'            => [
                'string',
                'nullable',
            ],
            'instagram'           => [
                'string',
                'nullable',
            ],
            'twitter'             => [
                'string',
                'nullable',
            ],
            'linkedin'            => [
                'string',
                'nullable',
            ],
            'pinterest'           => [
                'string',
                'nullable',
            ],
            'telegram'            => [
                'string',
                'nullable',
            ],
            'general_image_path'  => [
                'string',
                'nullable',
            ],
            'product_image_path'  => [
                'string',
                'nullable',
            ],
            'vendor_image_path'   => [
                'string',
                'nullable',
            ],
            'slide_image_path'    => [
                'string',
                'nullable',
            ],
            'product_video_path'  => [
                'string',
                'nullable',
            ],
            'category_image_path' => [
                'string',
                'nullable',
            ],
            'start_opening_time'  => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'close_openning_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
