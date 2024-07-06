<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Admin;
use App\Models\Category;
use App\Models\datacons;
use PDF;

class OrderController extends Controller
{
    // public function showConfirmation(Request $request)
    // {
    //     $name = $request->input('name');
    //     $email = $request->input('email');

    //     // ดึงข้อมูลการสั่งซื้อจากแหล่งข้อมูล (ตามความเหมาะสม)

    //     return view('shop.confirm', [
    //         'name' => $name,
    //         'email' => $email,
    //         // 'customerName' => $customerName,
    //     ]);
    // }
    // public function checkout(Request $request)
    // {
    //     // ประมวลผลการสั่งซื้อ และบันทึกข้อมูลการสั่งซื้อลงในฐานข้อมูล (ตามความเหมาะสม)

    //     return redirect()->route('thankyou');
    // }

    // คอมเพล็ก ข้อมูลเพื่อใช้คำนวณราคา
    public function shopProduct(Request $request)
    {
        $profiles = Admin::all();
        return view('shop.shop', compact('profiles'));
    }

    public function shop1()
    {
        return view('shop.shop1');
    }
    public function shop2()
    {
        return view('shop.shop2');
    }
    public function shop3()
    {
        return view('shop.shop3');
    }
    public function shop4()
    {
        return view('shop.shop4');
    }
    public function Order(Request $request)
    {
        // $request->validate([
        //     'concertname' => 'required',
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'zone' => 'required|min:8',
        //     'count' => 'required|min:8',
        //     'price' => 'required|min:8',
        //     'date' => 'required|min:8',
        // ]);
        $user = new Order();
        $user->concertname = $request->concertname;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->zone = $request->ZONE;
        $user->count = $request->count;
        $user->price = $request->price;
        $user->date = $request->exp_date;
        $answer = $user->save();

        if ($answer) {
            return back()->with('success', 'การจองสำเร็จ');
        } else {
            return
                back()->with('fail', 'การจองผิดพลาด');
        }
    }

    // public function pay()
    // {

    // }
    // public function show()
    // {
    //     // ดึงข้อมูลที่คุณต้องการแสดง จากฐานข้อมูลหรือแหล่งข้อมูลอื่น ๆ
    //     $data = Order::all(); // ตัวอย่างการดึงข้อมูลจาก Model

    //     // ส่งข้อมูลไปยังหน้าที่คุณต้องการแสดง
    //     return view('shop.confirm', ['data' => $data]);
    // }
    //    addmin
    public function createcon()
    {
        return view('admin.createconcert');
    }
    public function adminprofile()
    {
        $users = Admin::all();
        return view('admin.admin', compact('users'));
    }
    public function cus()
    {
        $adds = Order::all();
        return view('admin.showcus', compact('adds'));
    }
    public function showadmin($id)
    {
        $add = Order::find($id);
        return view('admin.showadmin', compact('add'));
    }
    public function edit($id)
    {
        $add = Order::find($id);
        return view('admin.editadmin', compact('add'));
    }

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

        // ดึง category_id จากตาราง Category
        $category = Category::where('some_condition', $request->some_value)->first(); // แทน 'some_condition' และ 'some_value' ด้วยเงื่อนไขที่เหมาะสม

        if (!$category) {
            return back()->with(
                'error',
                'Category not found'
            );
        }

        $user = datacons::find($request->id);
        if ($user) {
            $user->concertname = $concertname;
            $user->artist = $artist;
            $user->mapzone = $mapzone;
            $user->rateprice = $rateprice;
            $user->datecon = $datecon;
            $user->detail = $detail;
            $user->category_id = $category->id; // บันทึก category_id
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
        $concertname = $request->concertname;
        $artist = $request->artist;
        $mapzone = $request->mapzone;
        $rateprice = $request->rateprice;
        $datecon = $request->datecon;
        $detail = $request->detail;
        $file = $request->file('imagecon');
        $imageconname = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('image'), $imageconname);

        // ดึง category_id จากตาราง Category
        $category = Category::where('some_condition', $request->some_value)->first(); // แทน 'some_condition' และ 'some_value' ด้วยเงื่อนไขที่เหมาะสม

        if (!$category) {
            return back()->with('error', 'Category not found');
        }
        $user = new datacons();
        $user->concertname = $concertname;
        $user->artist = $artist;
        $user->mapzone = $mapzone;
        $user->rateprice = $rateprice;
        $user->datecon = $datecon;
        $user->detail = $detail;
        $user->category_id = $category->id; // บันทึก category_id
        $user->imagecon = $imageconname;
        $user->save();

        return back()->with('add-con', 'save successfully');
    }

    // ดึงข้อมุล category ส่งไป view
    public function showAddForm()
    {
        $categories = Category::all();
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
        $profiles = Admin::all();
        return view('user.index', compact('profiles'));
    }
}
