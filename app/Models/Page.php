<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'tblpage';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'PageType',
        'PageTitle',
        'PageDescription'
    ];
}