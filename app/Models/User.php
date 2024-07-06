<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    protected $profileimage = [
        'name', 'email', 'password', 'profile_image', // เพิ่ม 'profile_image' ใน $fillable
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'fileimg', // เพิ่ม 'fileimg' เข้าไปใน fillable attributes
        // ... ฟิลด์อื่น ๆ
    ];
}
