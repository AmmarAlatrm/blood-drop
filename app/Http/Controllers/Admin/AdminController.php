<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;



use Illuminate\Auth\Authenticatable;
use App\Models\hospital;


class AdminController extends Controller
{

use Authenticatable, AuthenticatesUsers;




public function pendingHospitals()
{
    // جلب المستشفيات التي تنتظر الموافقة فقط
    $pendingHospitals = \App\Models\hospital::where('is_approved', false)->get();

    return view('admin.pending_hospitals', compact('pendingHospitals'));
}



public function approveHospital($id)
    {
        $hospital = hospital::findOrFail($id);
        $hospital->is_approved = true; // أو 1
        $hospital->save();

        return redirect()->back()->with('success', 'تم قبول وتفعيل حساب المشفى بنجاح.');
    }



    public function rejectHospital($id)
    {
        $hospital = hospital::findOrFail($id);
        $hospital->delete();

        return redirect()->back()->with('success', 'تم رفض الطلب وحذف حساب المشفى.');
    }

}
?>
