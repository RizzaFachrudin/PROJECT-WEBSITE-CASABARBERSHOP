<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    protected $table = 'tblservices';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ServiceName',
        'ServiceDescription',
        'Cost',
        'Image'
    ];
}