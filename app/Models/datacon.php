<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datacon extends Model
{
    use HasFactory;
    // app/TableName.php

    // ตัวอย่างความสัมพันธ์ belongsTo กับอีก Model
    protected $fillable = [
        'concertname', 'artist', 'mapzone', 'rateprice', 'detail', 'category_id', 'imagecon', 'imagemap',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function zones()
    {
        return $this->hasMany(Zone::class);
    }
}
