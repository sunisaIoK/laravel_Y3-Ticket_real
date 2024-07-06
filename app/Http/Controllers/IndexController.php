<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;



class IndexController extends Controller
{
    // public function index(){
    //     return view('user.index');
    // }

    //ฟังก์ชันจัดเก็บข้อมูล
    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $image = $request->file('file');
        $imagename = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imagename);

        //บันทึกข้อมูลลงตาราง
        $pro = new User();
        $pro->name = $name;
        $pro->email = $email;
        $pro->password = $password;
        $pro->profileimage = $imagename;
        $pro->save();

        //send message
        return back()->with('profile_add', ('save successfully'));
        //profile_add ในฟอร์มใช้ตัวนี้เช็คค่าข้อมูล
    }
    public function index()
    {
        $nameartist = Admin::all();
        return view('user.index', compact('nameartist'));
    }

    public function show($id)
    {
        $profile = User::find($id);
        return view('user.show', compact('profile'));
    }

    public function edit($id)
    {
        $profile = User::find($id);
        return view('user.edit', compact('profile'));
    }
    public function update(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $image = $request->file('file');
        //ถ้าแก้ไขต้องเปลี่ยนรูปด้วย
        $imagename = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imagename);

        $profile = User::find($request->id);
        $profile->name = $name;
        $profile->email = $email;
        $profile->password = $password;
        $profile->profileimage = $imagename;
        $profile->save();

        return back()->with('profile_update', 'Update Successfully');
    }
}

