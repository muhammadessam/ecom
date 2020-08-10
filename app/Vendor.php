<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Vendor extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Auditable;

    public $table = 'vendors';

    protected $hidden = [
        'password',
    ];

    protected $appends = [
        'img',
        'cover_img',
    ];

    protected $dates = [
        'renew_commision_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const COMMISION_TYPE_RADIO = [
        'fixed'                => 'Fixed',
        'percentage'           => 'Percentage',
        'fixed and percentage' => 'fixed and percentage',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'about',
        'is_active',
        'commision_annual_price',
        'renew_commision_date',
        'commision_type',
        'is_knet_supported',
        'is_cc_supported',
        'minimum_charge',
        'website',
        'extra_info',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
        'pinterest',
        'openning',
        'closing',
        'phone_1',
        'phone_2',
        'phone_3',
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

    public function vendorBrands()
    {
        return $this->hasMany(Brand::class, 'vendor_id', 'id');
    }

    public function vendorOrders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function getImgAttribute()
    {
        $file = $this->getMedia('img')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getRenewCommisionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRenewCommisionDateAttribute($value)
    {
        $this->attributes['renew_commision_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCoverImgAttribute()
    {
        $file = $this->getMedia('cover_img')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
}
