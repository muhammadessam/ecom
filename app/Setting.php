<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Setting extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'settings';

    protected $appends = [
        'logo',
    ];

    const UPDATEIOS_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    const CLOSE_ORDER_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    const UPDATEANDROID_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'store_name',
        'store_title',
        'description',
        'address',
        'e_mail',
        'receive_order_email',
        'telephone',
        'mobile',
        'close_order',
        'ios_app_link',
        'android_app_link',
        'updateios',
        'updateandroid',
        'iosupdatever',
        'androidupdatever',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'pinterest',
        'telegram',
        'general_image_path',
        'product_image_path',
        'vendor_image_path',
        'slide_image_path',
        'product_video_path',
        'category_image_path',
        'start_opening_time',
        'close_openning_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
}
