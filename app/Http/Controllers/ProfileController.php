<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    //ฟังก์ชันจัดเก็บข้อมูล user
    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        //บันทึกข้อมูลลงตาราง
        $pro = new User();
        $pro->name = $name;
        $pro->email = $email;
        $pro->password = $password;
        $pro->save();

        //send message
        return back()->with('profile_add',('save successfully'));
        //profile_add ในฟอร์มใช้ตัวนี้เช็คค่าข้อมูล
    }

    // public function store(Request $request)
    // {
    //     $name = $request->name;
    //     $email = $request->email;


    //     $profile = new User();
    //     $profile->name = $name;
    //     $profile->email = $email;
    //     $profile->save();

    //     return back()->with('profile_added', 'Save Successfully');
    // }
    //index
    public function ProfileUser()
    {
         $profiles = User::all();
         return view('user.profile', compact('profiles'));
    }
    public function show($id)
    {
         $profile = User::find($id);
         return view('user.show', compact('profile'));
    }
    //edit
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
        $profile = User::find($request->id);
        $profile->name = $name;
        $profile->email = $email;
        $profile->password = $password;
        $profile->save();

        return back()->with('profile_update', 'Update Successfully');
    }

    //delete
    public function destroy($id)
    {
        $profile = User::find($id);
        //การลบไฟล์ในพาท
        unlink(public_path('images') . '/' . $profile->profileimage);
        $profile->delete();
        return back();
    }

    public function index()
    {
        $profiles = User::all();
        return view('user.index', compact('profiles'));
    }

    public function destroylogout($id)
    {
        $profile = User::find($id);
        $profile->delete();

        if (Session::has('loginUser')) {
            Session::pull('loginUser');
            // return redirect('login');
        }
         return view('auth.login');
        // return $id;

    }

    public function index1()
    {
        $profiles = User::all();
        return view('user.index', compact('profiles'));
    }


}

