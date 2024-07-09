<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Admin;
use App\Models\categories;
use App\Models\Category;
use App\Models\datacon;
use App\Models\Zone;
use PDF;

class OrderController extends Controller
{
    // สั่งซื้อ
    public function Order(Request $request)
    {
        // ดึงข้อมูล zone name จาก zones table
        $zone = Zone::findOrFail($request->zone_id);

        // Create a new order entry
        $order = new Order();
        // $order->concertname = $request->concertname;
        // $order->name = $request->name;
        // $order->email = $request->email;
        // $order->zone = $zone->zone_name; // ใช้ zone_name จาก zones table
        // $order->count = $request->count;
        // $order->price = $request->total;
        // $order->date = $request->exp_date;
        // $order = new Order();
    $order->concertname = $request->input('concertname');
    $order->name = $request->input('name');
    $order->email = $request->input('email');
    $order->zone = $request->input('zone_id');
    $order->count = $request->input('count');
    $order->price = $request->input('total'); // ต้องเป็นตัวเลข เช่น 4000.00
    $order->date = $request->input('date');
    $order->save();

        // Save the order
        if ($order->save()) {
            return back()->with('success', 'การจองสำเร็จ');
        } else {
            return back()->with('fail', 'การจองผิดพลาด');
        }
    }


    public function createcon()
    {
        // ดึงหมวดหมู่ทั้งหมดจากฐานข้อมูล
        $categories = Category::all(); // ดึงข้อมูลหมวดหมู่ทั้งหมดจากฐานข้อมูล
        return view(
            'admin.createconcert',
            [
                'categories' => $categories,
            ]
        );
    }

    public function cus()
    {
        $adds = Order::all();
        return view('admin.showcus', compact('adds'));
    }

    public function edit($id)
    {
        $add = Order::find($id);
        return view('admin.editadmin', compact('add'));
    }
    // อัพเดต
    public function updatecon(Request $request)
    {
        $concertname = $request->concertname;
        $artist = $request->artist;
        $mapzone = $request->mapzone;
        $rateprice = $request->rateprice;
        $datecon = $request->datecon;
        $detail = $request->detail;
        $datacons = $request->datacons;
        // ถ้ามีการอัพเดตรูปภาพใหม่
        if ($request->hasFile('file')) {
            $imagecon = $request->file('file');
            $imagename = time() . '.' . $imagecon->extension();
            $imagecon->move(public_path('images'), $imagename);
        }
        // ดึง categories_id จากตาราง categories
        $categories = Category::where('some_condition', $request->some_value)->first(); // แทน 'some_condition' และ 'some_value' ด้วยเงื่อนไขที่เหมาะสม
        if (!$categories) {
            return back()->with(
                'error',
                'categories not found'
            );
        }
        $user = datacon::find($request->id);
        if ($user) {
            $user->concertname = $concertname;
            $user->artist = $artist;
            $user->mapzone = $mapzone;
            $user->rateprice = $rateprice;
            $user->datecon = $datecon;
            $user->detail = $detail;
            $user->categories_id = $categories->id; // บันทึก categories_id
            if (isset($imagename)) {
                $user->imagecon = $imagename; // บันทึกชื่อรูปภาพใหม่ถ้ามีการอัพเดต
            }
            $user->save();
            return back()->with('admin_update', 'Update Successfully');
        } else {
            return back()->with('error', 'Data not found');
        }
    }
    public function adddatacon(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'concertname' => 'required|string|max:255',
                'artist' => 'required|string|max:255',
                'detail' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'imagecon' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'imagemap' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'zones.*.zone_name' => 'required|string|max:255',
                'zones.*.rateprice' => 'required|numeric',
            ]);

            // Create a new datacon entry
            $datacon = new Datacon();
            $datacon->concertname = $request->concertname;
            $datacon->artist = $request->artist;
            $datacon->detail = $request->detail;
            $datacon->category_id = $request->category_id;

            if ($request->hasFile('imagecon')) {
                $file = $request->file('imagecon');
                $imageconname = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $imageconname);
                $datacon->imagecon = $imageconname;
            }

            if ($request->hasFile('imagemap')) {
                $file = $request->file('imagemap');
                $imagemapname = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $imagemapname);
                $datacon->imagemap = $imagemapname;
            }

            $datacon->save();

            // Save zones
            foreach ($request->zones as $zone) {
                $datacon->zones()->create([
                    'zone_name' => $zone['zone_name'],
                    'rateprice' => $zone['rateprice'],
                ]);
            }

            // Return back with a success message
            return back()->with('status', 'Data saved successfully');
        } catch (\Exception $e) {
            // Return back with an error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    // ดึงข้อมูลให้ไปโชว์หน้า admin
    public function adminprofile()
    {
        $users = datacon::all();
        return view('admin.admin', compact('users'));
    }
    //  ดึงขอมูลไปโชว์แบบเช็คหมวดหมู่

    public function showadmin($id)
    {
        $add = Order::find($id);
        return view('admin.showadmin', compact('add'));
    }
    // ดึงข้อมุล categories ส่งไป view
    public function showAddForm()
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            dd('No categories found');
        } else {
            dd($categories);
        }
        return view('admin.createconcert', compact('categories'));
    }

    // confirm
    public function pay(Request $request)
    {
        $orders = Order::all();
        return view('shop.confirm', compact('orders'));
    }

    public function showConcerts()
    {
        // ดึงข้อมูลคอนเสิร์ตที่ขายอยู่ตอนนี้ (category_id = 1)
        $bookedNowConcerts = datacon::where('category_id', 1)->get();

        // ดึงข้อมูลคอนเสิร์ตที่เร็วๆ นี้ (category_id = 2)
        $upcomingConcerts = datacon::where('category_id', 2)->get();
        $MusicFestival = datacon::where('category_id', 3)->get();
        return view('user.index', compact('bookedNowConcerts', 'upcomingConcerts','MusicFestival'));
    }


}
