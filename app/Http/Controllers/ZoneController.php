<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datacon;

class ZoneController extends Controller
{
    // public function showOrderForm($concertId)
    // {
    //     // ดึงข้อมูลคอนเสิร์ต
    //     $concert = datacon::with('zones')->findOrFail($concertId);

    //     // ดึงข้อมูลโซนและราคาที่เกี่ยวข้องกับคอนเสิร์ตนี้
    //     $zones = $concert->zones;

    //     // ส่งข้อมูลไปยัง View
    //     return view('shop.shop1', compact('concert', 'zones'));
    // }

    // public function showOrderForm($id)
    // {
    //     // Fetch the datacon with the given ID along with its related zones
    //     $datacon = datacon::with('zones')->find($id);

    //     if (!$datacon) {
    //         return response()->json(['message' => 'Datacon not found'], 404);
    //     }
    //     return view('shop.shop1', compact('datacon'));
    // }
}
