<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datacon;
use App\Models\Order;
use App\Models\User;

use App\Models\purchase;

class ShopController extends Controller
{
    public function buyTicket($id)
        // ดึงข้อมูลคอนเสิร์ตตาม id จากฐานข้อมูล
        {
        // ใช้ $id เพื่อดึงข้อมูลคอนเสิร์ตจากฐานข้อมูล
        $datacon = datacon::with('zones')->find($id);
        $concert = datacon::find($id);
        // ดึงข้อมูลผู้ใช้จาก session
        $user = session('user');
        // ดึงข้อมูลผู้ใช้จากตาราง users
        $Username = User::find($user->id);

            if (!$concert) {
                abort(404, 'Concert not found');
            }
            return view('shop.shop1', compact('datacon','concert','Username'));
        }

    public function History()
    {
        // ดึงข้อมูลผู้ใช้จาก session
        $user = session('user');
        if (!$user) {
            return redirect('login')->withErrors(['error' => 'You need to log in first.']);
        }
        // ดึงข้อมูลการซื้อของผู้ใช้สำหรับคอนเสิร์ตนี้ โดยใช้ user_name
        $purchases = Order::where('name', $user->name)->get();

        // ส่งข้อมูลการซื้อไปยัง View
        return view('shop.shop', compact('purchases'));
    }
}

