<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrean extends Model
{
    protected $table = 'antreans';
    protected $primaryKey = 'id_antrean';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'nama_pelanggan',
        'nomor_antrean',
        'total_biaya',
        'metode_pembayaran',
        'status_pembayaran',
        'status_antrean',
        'ServiceId',

    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'ServiceId', 'ID');
    }
}
