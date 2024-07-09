<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function handleAdmin(Request $request)
    {
        // ประมวลผลคำขอ POST ที่ส่งเข้ามา
        // ...

        return response()->json(['success' => 'Request handled successfully']);
    }
}
