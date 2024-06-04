<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\BentukRequest;
use App\Models\Notifikasi;
use App\Models\Pengajuan;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //Controller untuk melihat user dashboard
    function index(){
        $user = Auth::user();

        $userId = auth()->user()->id;
        // Total number of requests
        $totalRequests = Pengajuan::where('user_id', $userId)->count();

        // Total requests by status
        $totalApproved = Pengajuan::where('user_id', $userId)->where('status', 'disetujui')->count();
        $totalPending = Pengajuan::where('user_id', $userId)->where('status', 'pending')->count();
        $totalRejected = Pengajuan::where('user_id', $userId)->where('status', 'ditolak')->count();

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','read') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();


        return view('user/user-dashboard', compact('user','totalRequests', 'totalApproved', 'totalPending', 'totalRejected', 'notifikasis', 'totalUnreadNotifications'));
    }

    //Controller untuk melihat List Request
    public function lihatListRequests()
    {
        $user = Auth::user();

        $userId = auth()->user()->id;
        // Total number of requests

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','read') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();

        return view('user/user-list-request', compact('user', 'notifikasis', 'totalUnreadNotifications'));
    }

    //Controller untuk melihat List Request
    public function lihatFormPengajuan()
    {
        $user = Auth::user();
        $bentukRequests = BentukRequest::all();

        // Assuming the IDs for Video and Liputan are known (replace with actual IDs)
        $videoId = BentukRequest::where('name', 'Video')->first()->id;
        $liputanId = BentukRequest::where('name', 'Liputan')->first()->id;

        $disabledDates = Pengajuan::whereIn('bentuk_request_id', [$videoId, $liputanId])
            ->where('status', 'disetujui')
            ->pluck('deadline')
            ->map(function ($date) {
                return $date->format('d-m-Y');
            });

            $userId = auth()->user()->id;
            // Total number of requests

            $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                                ->where('status', 'unread')
                                                ->count();

            $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                                ->where('user_id', $userId)
                                                ->where('status','read') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                                ->latest()
                                                ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                                ->get();

        return view('user/user-add-request', compact('user', 'bentukRequests', 'disabledDates', 'videoId', 'liputanId', 'notifikasis', 'totalUnreadNotifications'));
    }

    public function viewUserKalender()
    {
        $user = Auth::user();
        $bentukRequests = BentukRequest::all();

        $userId = auth()->user()->id;
        // Total number of requests

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','read') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();

        return view('user/user-kalender', compact('user', 'notifikasis', 'totalUnreadNotifications'));
    }
}
