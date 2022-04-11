<?php

namespace Qubiqx\QcommerceEcommerceExactonline\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Qubiqx\QcommerceEcommerceCore\Models\Order;

class ExactonlineOrder extends Model
{
    use LogsActivity;

    protected static $logFillable = true;

    protected $table = 'qcommerce__order_exactonline';

    protected $fillable = [
        'order_id',
        'exactonline_id',
        'error',
        'pushed',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
