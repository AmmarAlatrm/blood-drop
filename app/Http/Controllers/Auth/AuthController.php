<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Models\announcement;
use App\Models\hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\userinfo;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SignupDonorRequest;


class AuthController extends Controller
{
    use Authenticatable, AuthenticatesUsers;

    public function index()
    {
        return view('index');
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function loginf()
    {
        return view('auth.login');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = userinfo::where('bloodtype', 'like', "%$search")->get();
        return view('Donors', ['results' => $results]);
    }

    public function actionsignin(Request $request)
    {
        $request->validate([
            'usertype' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // 1. المصادقة وجلب بيانات المستخدم
        if (Auth::attempt($credentials)) {

            // 2. التحقق من تطابق نوع الحساب الحقيقي مع الخيار المختار في الشاشة
            if (Auth::user()->usertype === $request->usertype) {

                // إذا كان نوع الحساب مشفى، نتحقق من موافقة الأدمن (is_approved)
                if (Auth::user()->usertype === 'hospital') {
                    $hospital = hospital::where('username', Auth::user()->username)->first();

                    // في حال عدم وجود المشفى أو لم يتم تفعيله بعد
                    if ($hospital && !$hospital->is_approved) {
                        Auth::logout();
                        return redirect()->back()->with('error', 'حساب المشفى قيد المراجعة والتدقيق من قبل الإدارة ولم يتم تفعيله بعد.');
                    }

                    return redirect()->intended('Donorshos')->with('success', 'تم تسجيل الدخول كمشفى بنجاح.');
                }

                // في حال كان متبرع عادي
                return redirect()->intended('Donors')->with('success', 'تم تسجيل الدخول كمتبرع بنجاح.');
            }

            // في حال اختار نوع حساب خاطئ من القائمة
            Auth::logout();
            return redirect()->back()->with('error', 'نوع الحساب المحدد لا يتطابق مع بيانات حسابك المسجلة.');
        }

        // 3. في حال كانت بيانات الدخول (اسم المستخدم أو كلمة المرور) غير صحيحة
        return redirect()->back()->with('error', 'اسم المستخدم أو كلمة المرور غير صحيحة.');
    }

    public function actionsignup(SignupDonorRequest $request)
    {
        // الكود سيصل إلى هنا فقط إذا تجاوز التحقق بنجاح!
        // يمكننا استخدام $request->validated() لجلب البيانات المفلترة فوراً

        $user = User::create([
            'username' => $request->validated('username'),
            'password' => bcrypt($request->validated('password')),
            'usertype' => 'normal',
        ]);

        // دالة only مفيدة هنا لجلب جزء محدد فقط من البيانات الموثوقة ككتلة واحدة (Array)
        $user->userinfo()->create(
            $request->only(['fullname', 'age', 'address', 'mobile', 'bloodtype'])
        );

        return redirect("login")->with('success', 'تم إنشاء الحساب بنجاح!');
    }

    public function actionsignuphos(Request $request)
    {
        $validatedData = $request->validate([
            'name'     => 'required|string|max:60',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
            'city'     => 'required|string|max:60',
            'address'  => 'required|string|max:60',
            'mobile'   => 'required|string|unique:hospitals,mobile',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
            'usertype' => 'hospital',
        ]);

        // إنشاء بيانات المشفى
        // لن يتم إدخال حقل is_approved هنا أبداً، وبالتالي سيأخذ القيمة الافتراضية false من قاعدة البيانات
        $user->hospital()->create([
            'name'    => $validatedData['name'],
            'city'    => $validatedData['city'],
            'address' => $validatedData['address'],
            'mobile'  => $validatedData['mobile'],
        ]);

        return redirect("login")->with('success', 'تم إرسال طلب التسجيل بنجاح. الحساب قيد المراجعة من الإدارة.');
    }

    public function AddAnnounce(Request $request)
    {
        $request->validate([
            'neededbloodtype' => 'required',
        ]);

        $data = $request->all();

        $this->createannouncement($data);
        return redirect("profile")->with('success', 'تم إضافة الإعلان بنجاح.');
    }

    public function Donors()
    {
        if (Auth::check()) {
            return view('Donors');
        }

        return redirect("login")->with('error', 'يرجى تسجيل الدخول أولاً للوصول إلى هذه الصفحة.');
    }

    public function Donorshos()
    {
        if (Auth::check()) {
            return view('Donorshos');
        }

        return redirect("login")->with('error', 'يرجى تسجيل الدخول أولاً للوصول إلى هذه الصفحة.');
    }

    public function profile()
    {
        if (Auth::check()) {
            return view('profile');
        }

        return redirect("login")->with('error', 'يرجى تسجيل الدخول أولاً للوصول إلى هذه الصفحة.');
    }

    public function create(array $data)
    {
        return userinfo::create([
            'fullname'  => $data['fullname'],
            'username'  => $data['username'],
            'password'  => Hash::make($data['password']),
            'mobile'    => $data['mobile'],
            'address'   => $data['address'],
            'age'       => $data['age'],
            'bloodtype' => $data['bloodtype'],
        ]);
    }

    public function createannouncement(array $data)
    {
        return announcement::create([
            'neededbloodtype' => $data['neededbloodtype'],
            'hospital_id'     => Auth::id(),
        ]);
    }

    public function createindefault(array $data, string $type)
    {
        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'usertype' => $type,
        ]);
    }

    public function createhos(array $data)
    {
        return hospital::create([
            'name'     => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'mobile'   => $data['mobile'],
            'address'  => $data['address'],
            'city'     => $data['city'],
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('index');
    }
}
