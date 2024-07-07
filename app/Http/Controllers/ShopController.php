<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datacon;

class ShopController extends Controller
{
    public function buyTicket($id)
        // ดึงข้อมูลคอนเสิร์ตตาม id จากฐานข้อมูล
        {
            // ใช้ $id เพื่อดึงข้อมูลคอนเสิร์ตจากฐานข้อมูล
            $concert = datacon::find($id);
            if (!$concert) {
                abort(404, 'Concert not found');
            }
            return view('shop.shop1', ['concert' => $concert]);
        }
}
