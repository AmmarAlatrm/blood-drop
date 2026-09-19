<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Controllers\Controller;
use App\Models\announcement;
use App\Models\hospital;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\support\Facades\Hash;

use App\Models\User;
use App\Models\userinfo;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller

{

use Authenticatable, AuthenticatesUsers;
    // code login method

    public function index()

    {

        return view('index');

    }

    // code registration method

    public function signup()

    {

        return view('auth.signup');

    }

    public function loginf()

    {

        return view('auth.login');

    }

    // code action login method

    public function search(Request $request){
        $search=$request->input('search');
        $results=userinfo::where('bloodtype','like',"%$search");
        return view('Donors',['results'=>$results]);
    }
    public function actionsignin(Request $request)

    {

        $request->validate([
            'usertype',

            'username',

            'password',

        ]);



        $credentials = $request->only('username', 'password');
        if($request->usertype=='normal'){
         if(Auth::attempt($credentials)) {

            return redirect()->intended('Donors')

                ->withSuccess('You have Successfully loggedin');
         }}
         elseif ($request->usertype== 'hospital') {
            if(Auth::attempt($credentials)) {
            return redirect()->intended('Donorshos')->withSuccess('You have Successfully loggedin');
             }}
         else{

        return redirect("contactus")->withSuccess('Please enter valid credentials');

    }}


    // code action registration method

    public function actionsignup(Request $request)

    {

        $request->validate([

            'fullname' => 'required',

            'username' => 'unique:userinfos',

            'password' => 'min:6',

            'age',

            'address' ,

            'mobile' => 'unique:userinfos',

            'bloodtype' ,

        ]);
        $data = $request->all();

        $check = $this->create($data);
        $check = $this->createindefault($data);
        return redirect("index")->withSuccess('You have Successfully signup go login');

    }



    public function actionsignuphos(Request $request)

    {

        $request->validate([

            'name' => 'required',

            'username' => 'unique:hospitals',

            'password' => 'min:6',

            'address' ,

            'mobile' => 'unique:hospitals',

            'city',


        ]);
        $data = $request->all();

        $check = $this->createhos($data);
        $check = $this->createindefault($data);
        return redirect("login")->withSuccess('You have Successfully signup go login');

    }
    public function AddAnnounce(Request $request)

    {

        $request->validate([

            'neededbloodtype' => 'required',



        ]);
        $data = $request->all();

        $check = $this->createannouncement($data);
        return redirect("profile")->withSuccess('You have added announcement');

    }

    // code dashboard method

    public function Donors()

    {

        if (Auth::check()) {

            return view('Donors');

        }

        return redirect("login")->withSuccess('You do not have access');

    }

    public function Donorshos()

    {

        if (Auth::check()) {

            return view('Donorshos');

        }

        return redirect("login")->withSuccess('You do not have access');

    }

    public function profile()

    {

        if (Auth::check()) {

            return view('profile');

        }

        return redirect("login")->withSuccess('You do not have access');

    }



    // code create method

    public function create(array $data)

    {

        return userinfo::create([

            'fullname' => $data['fullname'],

            'username' => $data['username'],

            'password' => Hash::make($data['password']),

            'mobile'  => $data['mobile'],

            'address' => $data['address'],

            'age' => $data['age'],

            'bloodtype' =>$data['bloodtype']

        ]);

    }

    public function createannouncement(array $data)

    {

        return announcement::create([

            'neededbloodtype' => $data['neededbloodtype'],


        ]);

    }
    public function createindefault(array $data)

    {

        return user::create([



            'username' => $data['username'],

            'password' => Hash::make($data['password']),


        ]);

    }

    public function createhos(array $data)

    {

        return hospital::create([

            'name' => $data['name'],

            'username' => $data['username'],

            'password' => Hash::make($data['password']),

            'mobile'  => $data['mobile'],

            'address' => $data['address'],

            'city'=>$data['city'],
        ]);

    }



    // code logout method

    public function logout()

    {

        Session::flush();

        Auth::logout();

        return Redirect('index');

    }

}

?>
