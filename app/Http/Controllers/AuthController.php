<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{

    //regis
    public function regis()
    {
        return view('auth.regis');
    }

    public function regisUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            // 'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // เงื่อนไขของรูปภาพ
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $answer = $user->save();

        // // อัปโหลดรูปภาพและบันทึกในฐานข้อมูล (ถ้ามี)
        // if ($request->hasFile('file')) {
        //     $image = $request->file('file')->store('images', 'public');
        //     $user->profileimage = $image;
        // $user->save();
        // }

        if ($answer) {
            return back()->with('success', 'regis success');
        } else {
            return
                back()->with('fail', 'Something wrong');
        }
    }

    //login
    public function home()
    {
        return view('home.Home');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) { {
                    // สำหรับผู้ใช้ทั่วไป
                    $request->session()->put('userRole', 'user');
                    return redirect('index');
                }
            } else {
                return back()->with('fail', 'Password does not match');
            }
        }

        $user = Admin::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // ตรวจสอบสำหรับ Admin ที่มี email เป็น sunisa@gmail.com และ password เป็น sunisa
                if ($user->role == 'admin' && $user->email == 'sunisa@gmail.com' && $request->password == 'sunisa') {
                    $request->session()->put('userRole', 'admin');
                    return redirect('admin');
                } else {
                    return back()->with('fail', 'Password does not match');
                }
            }
        }
    }


    //user
    public function index()
    {
        $user = array();
        if (Session::has('loginUser')) {
            $user = User::where('id', '=', Session::get('loginUser'))->first();
        }
        return view('home', compact('user'));
    }


    //Log out

    public function logout()
    {
        if (Session::has('loginUser')) {
            Session::pull('loginUser');
            return redirect('user.login');
        }
    }

    //user
    public function user()
    {
        return view('user.profile');
    }


    public function Profile()
    {
        $profiles = User::all();
        return view('user.index', compact('profiles'));
    }
}
