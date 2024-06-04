<?php

namespace App\Http\Controllers;

use App\Mail\NewUserWelcome;
use App\Mail\UpdateRole;
use Illuminate\Support\Facades\Auth;
use App\Models\BentukRequest;
use App\Models\Notifikasi;
use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    function index(){
        $user = Auth::user();
        $userId = auth()->user()->id;

        $totalRequests = Pengajuan::count();
        $totalApproved = Pengajuan::where('status', 'disetujui')->count();
        $totalPending = Pengajuan::where('status', 'pending')->count();
        $totalRejected = Pengajuan::where('status', 'ditolak')->count();

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                    ->where('user_id', $userId) // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                    ->where('status','read')
                                    ->latest()
                                    ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                    ->get();

        return view('admin/admin-dashboard', compact('user','totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }

    public function dashboardData()
    {
        // Calculate the total number of requests for each status
        $totalApproved = Pengajuan::where('status', 'disetujui')->count();
        $totalPending = Pengajuan::where('status', 'pending')->count();
        $totalRejected = Pengajuan::where('status', 'ditolak')->count();

        // Return the data as a JSON response
        return response()->json([
            'approved' => $totalApproved,
            'pending' => $totalPending,
            'rejected' => $totalRejected,
        ]);
    }

    public function adminLihatFormPengajuan()
    {
        $user = Auth::user();
        $userId = auth()->user()->id;

        $totalRequests = Pengajuan::count();
        $totalApproved = Pengajuan::where('status', 'disetujui')->count();
        $totalPending = Pengajuan::where('status', 'pending')->count();
        $totalRejected = Pengajuan::where('status', 'ditolak')->count();

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                    ->where('user_id', $userId) // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                    ->where('status','read')
                                    ->latest()
                                    ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                    ->get();
        $bentukRequests = BentukRequest::all();
        return view('admin/admin-add-request', compact('user', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }


    public function adminLihatFormTambahUser()
    {
        $user = Auth::user();
        $userId = auth()->user()->id;

        $totalRequests = Pengajuan::count();
        $totalApproved = Pengajuan::where('status', 'disetujui')->count();
        $totalPending = Pengajuan::where('status', 'pending')->count();
        $totalRejected = Pengajuan::where('status', 'ditolak')->count();

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                    ->where('user_id', $userId) // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                    ->where('status','read')
                                    ->latest()
                                    ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                    ->get();
        $bentukRequests = BentukRequest::all();
        return view('admin/admin-add-user', compact('user', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }

    public function adminLihatListRequests()
    {
        $user = Auth::user();
        $userId = auth()->user()->id;

        $totalRequests = Pengajuan::count();
        $totalApproved = Pengajuan::where('status', 'disetujui')->count();
        $totalPending = Pengajuan::where('status', 'pending')->count();
        $totalRejected = Pengajuan::where('status', 'ditolak')->count();

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                    ->where('user_id', $userId) // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                    ->where('status','read')
                                    ->latest()
                                    ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                    ->get();
        $bentukRequests = BentukRequest::all();
        return view('admin/admin-list-request', compact('user', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }

    public function adminLihatListUsers()
    {
        $user = Auth::user();
        $userId = auth()->user()->id;

        $totalRequests = Pengajuan::count();
        $totalApproved = Pengajuan::where('status', 'disetujui')->count();
        $totalPending = Pengajuan::where('status', 'pending')->count();
        $totalRejected = Pengajuan::where('status', 'ditolak')->count();

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                    ->where('user_id', $userId) // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                    ->where('status','read')
                                    ->latest()
                                    ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                    ->get();
        $bentukRequests = BentukRequest::all();

        $roles = [
            'admin' => [
                'users' => User::where('role', 'admin')->get(),
                'total' => User::where('role', 'admin')->count()
            ],
            'personil' => [
                'users' => User::where('role', 'personil')->get(),
                'total' => User::where('role', 'personil')->count()
            ],
            'user' => [
                'users' => User::where('role', 'user')->get(),
                'total' => User::where('role', 'user')->count()
            ],
        ];

        return view('admin/admin-list-user', compact('user','roles', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }

    public function adminLihatDetailRequest()
    {
        $user = Auth::user();
        $userId = auth()->user()->id;

        $totalRequests = Pengajuan::count();
        $totalApproved = Pengajuan::where('status', 'disetujui')->count();
        $totalPending = Pengajuan::where('status', 'pending')->count();
        $totalRejected = Pengajuan::where('status', 'ditolak')->count();

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                    ->where('user_id', $userId) // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                    ->where('status','read')
                                    ->latest()
                                    ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                    ->get();
        $bentukRequests = BentukRequest::all();
        return view('admin/admin-detail-request', compact('user', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }

    public function adminLihatFormEditRole($id)
    {
        $userin = Auth::user();
        $user = User::findOrFail($id);
        $userId = auth()->user()->id;

        $totalRequests = Pengajuan::count();
        $totalApproved = Pengajuan::where('status', 'disetujui')->count();
        $totalPending = Pengajuan::where('status', 'pending')->count();
        $totalRejected = Pengajuan::where('status', 'ditolak')->count();

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                    ->where('user_id', $userId) // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                    ->where('status','read')
                                    ->latest()
                                    ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                    ->get();
        $bentukRequests = BentukRequest::all();
        return view('admin/admin-update-role', compact('user', 'userin', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }

    public function adminUpdateRoleSubmit(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'role' => 'required|in:admin,personil,user',
        ]);

        // Find the user by ID and update the role
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->divisi = $request->divisi;
        $user->save();

        // dd($user->email);

        Mail::to($user->email)->send(new UpdateRole($user));

        // Redirect back with a success message
        return redirect()->route('admin.list-user')->with('success', 'Role updated successfully');
    }

    public function fetchPersonilData()
    {
        $personils = User::where('role', 'personil')->get()->map(function ($user) {
            // Count total projects with konfirmasi_project "Ya" for each personil
            $totalProjects = $user->projects()->whereHas('users', function ($query) use ($user) {
                $query->where('layanans.user_id', $user->id)
                      ->where('layanans.konfirmasi_project', 'Ya');
            })->count();

            return [
                'value' => $user->id,
                'name' => $user->name,
                'divisi' => $user->divisi,
                'totalProject' => $totalProjects
            ];
        });

        return response()->json($personils);
    }

    public function getUsersData(Request $request)
    {
        $users = User::all(); // Or any complex query you need

        // Format the data for DataTables
        $data = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role, // Assuming the role is a direct attribute
            ];
        });

        return Response::json(['data' => $data]);
    }

    public function storeUserData(Request $request)
    {
        // dd('masuk');
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,personil,user',
            'divisi' => 'nullable|in:Videografi,Reportase dan Kepenulisan,Fotografi,Design Grafis'
        ]);


        // Encrypt the password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Generate a unique verify key
        $verifyKey = Str::random(40);
        $validatedData['verify_key'] = $verifyKey;

        // Set email_verified_at to now
        $validatedData['email_verified_at'] = now();

        // Create the user
        $user = User::create($validatedData);

        // dd($user->email);
        Mail::to($user->email)->send(new NewUserWelcome($user));

        // Redirect or respond according to your needs
        return redirect()->route('admin.list-user')->with('success', 'User created and verified successfully.');
    }

    public function viewAdminKalender()
    {
        $user = Auth::user();
        $userId = auth()->user()->id;

        $totalRequests = Pengajuan::count();
        $totalApproved = Pengajuan::where('status', 'disetujui')->count();
        $totalPending = Pengajuan::where('status', 'pending')->count();
        $totalRejected = Pengajuan::where('status', 'ditolak')->count();

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                    ->where('user_id', $userId) // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                    ->where('status','read')
                                    ->latest()
                                    ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                    ->get();
        $bentukRequests = BentukRequest::all();
        $bentukRequests = BentukRequest::all();
        return view('admin/admin-kalender', compact('user','bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }

    public function viewAdminHelp()
    {
        $user = Auth::user();
        $userId = auth()->user()->id;

        $totalRequests = Pengajuan::count();
        $totalApproved = Pengajuan::where('status', 'disetujui')->count();
        $totalPending = Pengajuan::where('status', 'pending')->count();
        $totalRejected = Pengajuan::where('status', 'ditolak')->count();

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                    ->where('user_id', $userId) // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                    ->where('status','unread')
                                    ->latest()
                                    ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                    ->get();
        $bentukRequests = BentukRequest::all();
        return view('admin/admin-help', compact('user', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }
}

