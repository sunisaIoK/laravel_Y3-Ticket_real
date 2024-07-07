<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datacon extends Model
{
    use HasFactory;
    // app/TableName.php

    // ตัวอย่างความสัมพันธ์ belongsTo กับอีก Model
    public function relatedModel()
    {
        return $this->Order(Admin::class);
    }

    protected $fillable = [
        'concertname', 'artist', 'mapzone', 'rateprice', 'datecon', 'detail', 'categories_id', 'imagecon', 'imagemap',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
