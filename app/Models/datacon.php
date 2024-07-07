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
}
