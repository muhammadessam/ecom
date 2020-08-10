<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Order extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'orders';

    protected $dates = [
        'picked_at',
        'delievered_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'adress_id',
        'customer_id',
        'status_id',
        'shipping_frees',
        'picked_at',
        'delievered_at',
        'total_price',
        'discount',
        'to_be_paid',
        'serial',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function orderTransactions()
    {
        return $this->hasMany(Transaction::class, 'order_id', 'id');
    }

    public function adress()
    {
        return $this->belongsTo(Address::class, 'adress_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class);
    }

    public function getPickedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPickedAtAttribute($value)
    {
        $this->attributes['picked_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDelieveredAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDelieveredAtAttribute($value)
    {
        $this->attributes['delievered_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
