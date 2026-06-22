<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'tblinvoice';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'Userid',
        'ServiceId',
        'BillingId',
        'Total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'Userid');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'ServiceId', 'ID');
    }
}