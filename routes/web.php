<?php



use App\Models\announcement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\hospital;


use App\Http\Controllers\Auth\AuthController;


Route::get('/', [AuthController::class, 'index'])->name('index');

Route::get('/contactus', function(){
    return view('contactus');
});
Route::get('/aboutus', function(){
    return view('aboutus');
});
Route::get('/index', function(){
    return view('index');
});




Route::get('login', [AuthController::class, 'loginf'])->name('login');

Route::post('action-signin', [AuthController::class, 'actionsignin'])->name('login.action');

Route::get('signup', [AuthController::class, 'signup'])->name('signup');

Route::post('action-signup', [AuthController::class, 'actionsignup'])->name('register.action');

Route::post('action-signuphos', [AuthController::class, 'actionsignuphos'])->name('register.actionhos');

Route::post('add-announcement', [AuthController::class, 'AddAnnounce'])->name('AddAnnounce');

Route::get('Donors', [AuthController::class, 'Donors'])->name('Donors');

Route::get('Donorshos', [AuthController::class, 'Donorshos']);

Route::get('profile', [AuthController::class, 'profile'])->name('profile');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('Donors',function(){
    $datauser=DB::table('userinfos')->get();
    return view('Donors',['datauser'=>$datauser]);
});

Route::get('Donorshos',function(){
    $datauser=DB::table('userinfos')->get();
    return view('Donorshos',['datauser'=>$datauser]);
});
Route::get('search',[AuthController::class,'search'])->name('search');




?>
