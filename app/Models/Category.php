<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\datacon;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'status', 'type'
    ];


    public function datacon()
    {
        return $this->hasMany(datacon::class, 'category_id');
    }
}
