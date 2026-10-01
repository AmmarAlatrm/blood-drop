<?php

namespace App\Http\Controllers\Middleware;

namespace App\Http\Controllers\Auth;


use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Controllers\Controller;





use Illuminate\Auth\Authenticatable;

class Authenticate extends Controller
{
use Authenticatable, AuthenticatesUsers;


    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        // إذا كان الرابط المطلوب يبدأ بكلمة admin، وجهه لصفحة دخول الأدمن
        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.login');
        }

        // وإلا وجهه لصفحة دخول المستخدم العادي
        return route('login');
    }
}


}
