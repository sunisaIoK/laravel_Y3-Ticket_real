<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'concert_id', 'purchase_date', 'amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function concert()
    {
        return $this->belongsTo(datacon::class,'concert_id');
    }
}
