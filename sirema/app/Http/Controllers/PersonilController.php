<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\BentukRequest;
use App\Models\Notifikasi;
use App\Models\Project;
use Carbon\Carbon;

class PersonilController extends Controller
{
    //Controller untuk melihat personil dashboard
    public function index(){
        $user = Auth::user();
        $userId = $user->id;
        $today = Carbon::today();


        // Count total projects with konfirmasi_project "Ya"
        $totalProjects = Project::whereHas('users', function ($query) use ($userId) {
            $query->where('layanans.user_id', $userId)
                  ->where('layanans.konfirmasi_project', 'Ya');
        })->count();

        // Count total completed projects with konfirmasi_project "Ya"
        $totalCompletedProjects = Project::whereHas('users', function ($query) use ($userId) {
            $query->where('layanans.user_id', $userId)
                  ->where('layanans.konfirmasi_project', 'Ya');
        })->where('progress', Project::PROGRESS_COMPLETED)->count();

        // Count total ongoing projects with konfirmasi_project "Ya"
        $totalOngoingProjects = Project::whereHas('users', function ($query) use ($userId) {
            $query->where('layanans.user_id', $userId)
                  ->where('layanans.konfirmasi_project', 'Ya');
        })->where('progress', Project::PROGRESS_ONGOING)->count();

        // Count total ongoing projects with konfirmasi_project "Ya" and deadline passed
        $totalProjectsDeadlinePassed = Project::whereHas('users', function ($query) use ($userId) {
            $query->where('layanans.user_id', $userId)
                ->where('layanans.konfirmasi_project', 'Ya');
        })->whereHas('request', function ($query) use ($today) {
            $query->where('deadline', '<', $today);
        })->where('progress', Project::PROGRESS_ONGOING)->count();

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','read') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();

        return view('personil/personil-dashboard', compact('user', 'totalProjects', 'totalCompletedProjects', 'totalOngoingProjects','totalProjectsDeadlinePassed','notifikasis','totalUnreadNotifications'));
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

        return view('personil/personil-list-request', compact('user', 'notifikasis', 'totalUnreadNotifications'));
    }


    //Controller untuk melihat List Projects
    public function lihatListProjects()
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

        return view('personil/personil-list-project', compact('user', 'notifikasis', 'totalUnreadNotifications'));
    }

    public function viewPersonilKalender()
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

        $bentukRequests = BentukRequest::all();
        return view('personil/personil-kalender', compact('user', 'notifikasis', 'totalUnreadNotifications'));
    }
}
