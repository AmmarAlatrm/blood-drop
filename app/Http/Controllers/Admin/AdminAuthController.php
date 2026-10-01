<?php

namespace App\Http\Controllers\Admin;



use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hospital;

use Illuminate\Support\Facades\Auth;


use Illuminate\Auth\Authenticatable;



class AdminAuthController extends Controller
{

use Authenticatable, AuthenticatesUsers;


    // عرض صفحة تسجيل دخول الأدمن
    public function showLoginForm()
    {
        // إذا كان مسجل دخول مسبقاً، نوجهه للوحة التحكم
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    // معالجة بيانات تسجيل الدخول
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // محاولة الدخول عبر الـ Guard الخاص بالأدمن
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'تم تسجيل الدخول كأدمن');
        }

        return redirect()->back()->withErrors(['login' => 'بيانات الدخول غير صحيحة']);
    }

    // تسجيل الخروج
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    // صفحة لوحة التحكم (تجريبية)
    public function dashboard()
    {
        // جلب جميع المشافي التي تكون فيها is_approved تساوي false أو 0
        $pendingHospitals = hospital::where('is_approved', false)->get();

        return view('admin.dashboard', compact('pendingHospitals'));
    }
}

?>
