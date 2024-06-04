<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersonilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ProjectController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Personil
Route::get('/personil/list-request', function () {
    return view('personil/personil-list-request');
});

Route::get('/personil/detail-request', function () {
    return view('personil/personil-detail-request');
});

Route::get('/personil/list-project', function () {
    return view('personil/personil-list-project');
});

Route::get('/personil/detail-project', function () {
    return view('personil/personil-detail-project');
});

Route::get('/personil/kalender', function () {
    return view('personil/personil-kalender');
});

// Routes for Akun
Route::redirect('/', '/home')->name('landing.page');
Route::get('/login',[AuthController::class,'viewLoginPage'])->name('login');
Route::post('/login', [AuthController::class, 'loginAkun']);

Route::middleware(['guest'])->group(function(){
    Route::get('/registrasi',[AuthController::class,'viewRegisterPage'])->name('registrasi');
    Route::post('/registrasi', [AuthController::class, 'registerAkun']);

    Route::get('/verify',[AuthController::class,'viewVerifyConfirmation'])->name('verifikasi');
});

Route::get('/verify/{verify_key}',[AuthController::class,'verify']);

Route::middleware(['web','auth'])->group(function(){

    // Group for Users
    Route::middleware(['userAkses:user'])->group(function(){
        // User Routes
        Route::get('/user/dashboard',[UserController::class,'index'])->name('user');
        Route::get('/user/list-request', [UserController::class, 'lihatListRequests'])->name('user.list-request');
        Route::get('/user/ajukan-request', [UserController::class, 'lihatFormPengajuan'])->name('user.ajukan-request');
        Route::get('/user/kalender',[UserController::class,'viewUserKalender'])->name('user.kalender');
        Route::post('/user/submit-request', [RequestController::class, 'store'])->name('request.store');
        Route::get('/user/detail-request/request/{id}', [RequestController::class, 'show'])->name('requests.show');
        Route::get('/user/edit-request/request/{id}', [RequestController::class, 'viewEditForm'])->name('request.edit');
        Route::put('/user/edit-request/request/update/{id}', [RequestController::class, 'update'])->name('request.update');

    });

    // Group for Personil
    Route::middleware(['userAkses:personil'])->group(function(){
        Route::get('/personil/dashboard',[PersonilController::class,'index'])->name('personil');
        Route::get('/personil/list-request', [PersonilController::class, 'lihatListRequests'])->name('personil.list-request');
        Route::get('/personil/konfirmasi-request/{id}', [RequestController::class, 'viewPersonilEditForm'])->name('personil.requests.edit');
        Route::post('/personil/konfirmasi-request/terima-project/submit/{id}', [ProjectController::class, 'terimaProject'])->name('personil.terima-project');
        Route::get('/personil/konfirmasi-request/tolak-project/{id}', [RequestController::class, 'viewPersonilEditFormTolak'])->name('personil.edit.project.tolak');
        Route::post('/personil/konfirmasi-request/tolak-project/submit/{projectId}', [ProjectController::class, 'tolakProject'])->name('personil.tolak.project');
        Route::get('/personil/detail-request/request/{id}', [RequestController::class, 'personilShow'])->name('personil.requests.show');
        Route::get('/personil/konfirmasi-project/{id}', [RequestController::class, 'viewPersonilEditProjectForm'])->name('personil.project.edit');
        Route::post('/personil/konfirmasi-project/project-selesai/submit/{id}', [ProjectController::class, 'selesaikanProject'])->name('personil.selesaikan-project');
        Route::get('/personil/detail-project/project/{id}', [RequestController::class, 'personilProjectShow'])->name('personil.projects.show');
        Route::get('/personil/list-project', [PersonilController::class, 'lihatListProjects'])->name('project.list');
        Route::get('/personil/kalender',[PersonilController::class,'viewPersonilKalender'])->name('personil.kalender');
        Route::get('/personil/kalender/detail-request/request/{id}', [RequestController::class, 'personilKalenderShow'])->name('personil.requests.kalender.show');

    });

    // Group for Admin
    Route::middleware(['userAkses:admin'])->group(function(){
        Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin');
        Route::get('/admin/ajukan-request', [AdminController::class, 'adminLihatFormPengajuan'])->name('admin.ajukan-request');
        Route::post('/admin/submit-request', [RequestController::class, 'adminStoreRequest'])->name('admin.request.store');
        Route::get('/admin/list-request', [AdminController::class, 'adminLihatListRequests'])->name('admin.list-request');
        Route::get('/admin/detail-request/request/{id}', [RequestController::class, 'adminShow'])->name('admin.detail-request');
        Route::get('/admin/edit-request/request/{id}', [RequestController::class, 'viewAdminEditForm'])->name('admin.requests.edit');
        Route::get('/admin/edit-request/request/terima/{id}', [RequestController::class, 'viewAdminEditFormTerima'])->name('admin.edit.request.terima');
        Route::post('/admin//edit-request/request/terima/{requestId}/assign-personil', [RequestController::class, 'assignPersonil'])->name('requests.assign-personil');
        Route::get('/admin/edit-request/request/tolak/{id}', [RequestController::class, 'viewAdminEditFormTolak'])->name('admin.edit.request.tolak');
        Route::post('/admin//edit-request/request/tolak/{requestId}/comment', [RequestController::class, 'commentTolakRequest'])->name('requests.ket-admin');
        Route::get('/admin/list-user', [AdminController::class, 'adminLihatListUsers'])->name('admin.list-user');
        Route::get('/admin/tambah-user', [AdminController::class, 'adminLihatFormTambahUser'])->name('admin.tambah-user');
        Route::post('/admin/tambah-user/submit', [AdminController::class, 'storeUserData'])->name('admin.store-user');
        Route::get('/admin/edit-role/user/{id}', [AdminController::class, 'adminLihatFormEditRole'])->name('admin.edit-role');
        Route::post('/admin/edit-role/{id}/submit', [AdminController::class, 'adminUpdateRoleSubmit'])->name('admin.submit.update-role');
        Route::get('/admin/kalender',[AdminController::class,'viewAdminKalender'])->name('admin.kalender');
        Route::get('/admin/help',[AdminController::class,'viewAdminHelp'])->name('admin.help');

    });

    Route::post('/update-notification-status/{id}', [RequestController::class, 'updateStatus']);
    Route::post('/update-all-notifications-status', [RequestController::class, 'markAllAsRead']);

});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

Route::get('/forgot-password', [AuthController::class, 'forgot'])->name('forgot');
Route::post('forgot-password', function(Request $request){
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
    // return 'berhasil kirim email notifikasi reset password';
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
// Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/home', function () {
    return view('index');
});
