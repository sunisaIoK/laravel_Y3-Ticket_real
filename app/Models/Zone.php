<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;


    protected $fillable = [
        'datacon_id', 'zone_name', 'rateprice',
    ];

    public function datacon()
    {
        return $this->belongsTo(datacon::class, 'datacon_id');
    }
}
