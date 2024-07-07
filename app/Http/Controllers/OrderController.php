<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Admin;
use App\Models\categories;
use App\Models\Category;
use App\Models\datacon;
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
        $profiles = datacon::all();
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
    // เพิ่มข้อมูล
    public function adddatacon(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'concertname' => 'required|string|max:255',
                'artist' => 'required|string|max:255',
                'mapzone' => 'required|string|max:255',
                'rateprice' => 'required|numeric',
                // 'datecon' => 'required|date',
                'detail' => 'required|string',
                'categories' => 'required|exists:categories,id',
                'imagecon' => 'required|image',
                'imagemap' => 'required|image',
            ]);

            // Assign the validated data to variables
            $concertname = $request->concertname;
            $artist = $request->artist;
            $mapzone = $request->mapzone;
            $rateprice = $request->rateprice;
            // $datecon = $request->datecon;
            $detail = $request->detail;
            $category_id = $request->categories;

            // Handle the imagecon file upload
            if ($request->hasFile('imagecon')) {
                $file = $request->file('imagecon');
                $imageconname = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $imageconname);
            }

            // Handle the imagemap file upload
            if ($request->hasFile('imagemap')) {
                $file = $request->file('imagemap');
                $imagemapname = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('image'), $imagemapname);
            }

            // Create a new datacons entry
            $user = new datacon();
            $user->concertname = $concertname;
            $user->artist = $artist;
            $user->mapzone = $mapzone;
            $user->rateprice = $rateprice;
            // $user->datecon = $datecon;
            $user->detail = $detail;
            $user->category_id = $category_id; // Save the categories_id
            $user->imagecon = $imageconname ?? null; // Save the imagecon file name
            $user->imagemap = $imagemapname ?? null; // Save the imagemap file name
            $user->save();

            // Return back with a success message
            return back()->with('status', 'Data saved successfully');
        } catch (\Exception $e) {
            // Return back with an error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function adminprofile()
    {
        $users = datacon::all();
        return view('admin.admin', compact('users'));
    }
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
        $profiles = datacon::all();
        return view('user.index', compact('profiles'));
    }
}
