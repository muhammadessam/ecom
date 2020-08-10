<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Transaction extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'transactions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TYPE_RADIO = [
        'income'  => 'Income',
        'outcome' => 'outcome',
    ];

    protected $fillable = [
        'type',
        'amount',
        'order_id',
        'payment_method_id',
        'result',
        'postdate',
        'tranid',
        'auth',
        'ref',
        'trackid',
        'udf_1',
        'udf_2',
        'udf_3',
        'udf_4',
        'udf_5',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
}
