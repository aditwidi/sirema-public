<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\BentukRequest;
use App\Models\Project;
use App\Models\Layanan;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class RequestController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_pengaju' => 'required|string|max:255|regex:/^[A-Za-z\s]+$/',
            'asal_pengaju' => 'required|in:mahasiswa,dosen,bps,lainnya',
            'nomor_telepon_pengaju' => 'required|string|max:255|regex:/^[0-9+]+$/',
            'judul_request' => 'required|string|max:255|regex:/^[A-Za-z0-9\s\-]+$/',
            'bentuk_request_id' => 'required|exists:bentuk_requests,id',
            'deadline' => 'required|date',
            'required_personil' => 'required|integer|min:1'
        ], [
            'nomor_telepon_pengaju.regex' => 'Nomor telepon hanya boleh berisi angka dan simbol "+"',
            'nama_pengaju.regex' => 'Nama pengaju hanya boleh berisi huruf dan spasi',
            'judul_request.regex' => 'Judul request hanya boleh berisi huruf, angka, spasi, dan tanda hubung',
        ]);
        // dd($validatedData);
        // Create a new request in the database
        $pengajuan = Pengajuan::create($validatedData);

        $this->createNotifikasiUser($pengajuan);

        // dd('controller');
        // Create a new project related to the request
        Project::create([
            'progress' => '-', // Default progress
            'request_id' => $pengajuan->id // Link to the newly created request
        ]);

        // Redirect to the list of requests with a success message
        return redirect()->route('user.list-request');
    }

    public function adminStoreRequest(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_pengaju' => 'required|string|max:255|regex:/^[A-Za-z\s]+$/',
            'asal_pengaju' => 'required|in:mahasiswa,dosen,bps,lainnya',
            'nomor_telepon_pengaju' => 'required|string|max:255|regex:/^[0-9+]+$/',
            'judul_request' => 'required|string|max:255|regex:/^[A-Za-z0-9\s\-]+$/',
            'bentuk_request_id' => 'required|exists:bentuk_requests,id',
            'deadline' => 'required|date',
            'required_personil' => 'required|integer|min:1'
        ], [
            'nomor_telepon_pengaju.regex' => 'Nomor telepon hanya boleh berisi angka dan simbol "+"',
            'nama_pengaju.regex' => 'Nama pengaju hanya boleh berisi huruf dan spasi',
            'judul_request.regex' => 'Judul request hanya boleh berisi huruf, angka, spasi, dan tanda hubung',
        ]);
        // dd($validatedData);
        // Create a new request in the database
        $pengajuan = Pengajuan::create($validatedData);

        $this->createNotifikasi($pengajuan);

        // Create a new project related to the request
        Project::create([
            'progress' => '-', // Default progress
            'request_id' => $pengajuan->id // Link to the newly created request
        ]);

        // Redirect to the list of requests with a success message
        return redirect()->route('admin.list-request');
    }

    public function updateStatus(Request $request, $id)
    {
        $notification = Notifikasi::findOrFail($id);
        // Log::info('Status: ' . $request->status);
        // dd('iya');
        $notification->status = $request->status; // Or simply 'read'
        $notification->save();

        return response()->json(['message' => 'Notification updated successfully']);
    }

    private function createNotifikasi($pengajuan)
    {
        $projectTitle = $pengajuan->judul_request;
        $message = "Request Baru Telah Dibuat";
        $message2 = "Request dengan judul '{$projectTitle}' telah berhasil dibuat";
        Notifikasi::create([
            'user_id' => $pengajuan->user_id,
            'pengajuan_id' => $pengajuan->id,
            'message' => $message,
            'message2' => $message2,
            'status' => 'unread'
        ]);
    }

    private function createNotifikasiUser($pengajuan)
    {
        $projectTitle = $pengajuan->judul_request;
        $message = "Request Baru Telah Dibuat";
        $message2 = "Request dengan judul '{$projectTitle}' telah berhasil dibuat";
        Notifikasi::create([
            'user_id' => $pengajuan->user_id,
            'pengajuan_id' => $pengajuan->id,
            'message' => $message,
            'message2' => $message2,
            'status' => 'unread'
        ]);

        $adminUsers = User::where('role', 'admin')->get();
        $nama = $pengajuan->user->name;


        foreach ($adminUsers as $admin) {
            $message3 = "Request Baru Telah Diajukan oleh {$nama}";
            $message4 = "Request dengan judul '{$projectTitle}' telah berhasil dibuat";
            Notifikasi::create([
                'user_id' => $admin->id, // Admin user ID
                'pengajuan_id' => $pengajuan->id,
                'message' => $message3,
                'message2' => $message4,
                'status' => 'unread'
            ]);
        }
        // dd('iya');
    }

    public function listRequestByUser($user_id)
    {
        $requests = Pengajuan::with('bentukRequest', 'user')
        ->where('user_id', $user_id)
        ->get();

        // Transform the data as needed for the DataTable
        $data = $requests->map(function ($request) {
            return [
                'id' => $request->id,
                'nama_pengaju' => $request->nama_pengaju,
                'bentuk_request' => $request->bentukRequest->name,
                'judul_request' => $request->judul_request,
                'email' => $request->user->email,
                'status' => $request->status,
                'deadline' => $request->deadline->format('d-m-Y'),
                'progres' => $request->project ? $request->project->progress : null,
            ];
        });

        // Return data as JSON
        return response()->json(['data' => $data]);
    }

    public function listRequestByPersonil($user_id)
    {
        // Fetch requests based on user_id in the Layanan model related to Projects
        $requests = Pengajuan::with(['bentukRequest', 'user', 'project.users'])
            ->whereHas('project.users', function ($query) use ($user_id) {
                $query->where('users.id', $user_id); // Filter by the user_id in the Layanan table
            })
            ->get();

        // Transform the data as needed for the DataTable
        $data = $requests->map(function ($request) use ($user_id) {
            // Find the specific Layanan record for this user and project
            $layanan = $request->project ? $request->project->users()->wherePivot('user_id', $user_id)->first() : null;

            return [
                'id' => $request->id,
                'nama_pengaju' => $request->nama_pengaju,
                'bentuk_request' => $request->bentukRequest->name,
                'judul_request' => $request->judul_request,
                'email' => $request->user->email,
                'status' => $request->status,
                'deadline' => $request->deadline->format('d-m-Y'),
                'progres' => $request->project ? $request->project->progress : null,
                'layanan_ket_personil' => $layanan ? $layanan->pivot->ket_personil : null, // Add Layanan details
                'layanan_konfirmasi_project' => $layanan ? $layanan->pivot->konfirmasi_project : null, // Add more Layanan details
            ];
        });

        // Return data as JSON
        return response()->json(['data' => $data]);
    }

    public function listProjectByPersonil($user_id)
    {
        // Fetch requests based on user_id in the Layanan model related to Projects
        // and only where konfirmasi_project is "Ya"
        $requests = Pengajuan::with(['bentukRequest', 'user', 'project.users'])
            ->whereHas('project.users', function ($query) use ($user_id) {
                $query->where('users.id', $user_id)
                    ->where('layanans.konfirmasi_project', 'Ya'); // Filter by konfirmasi_project "Ya"
            })
            ->get();

        // Transform the data as needed for the DataTable
        $data = $requests->map(function ($request) use ($user_id) {
            // Find the specific Layanan record for this user and project
            $layanan = $request->project ? $request->project->users()->wherePivot('user_id', $user_id)->first() : null;

            // Only proceed if konfirmasi_project is "Ya"
            if ($layanan && $layanan->pivot->konfirmasi_project === 'Ya') {
                return [
                    'id' => $request->id,
                    'nama_pengaju' => $request->nama_pengaju,
                    'bentuk_request' => $request->bentukRequest->name,
                    'judul_request' => $request->judul_request,
                    'email' => $request->user->email,
                    'status' => $request->status,
                    'deadline' => $request->deadline->format('d-m-Y'),
                    'progres' => $request->project ? $request->project->progress : null,
                    'layanan_ket_personil' => $layanan->pivot->ket_personil, // Add Layanan details
                    'layanan_konfirmasi_project' => $layanan->pivot->konfirmasi_project, // Add more Layanan details
                ];
            }
        })->filter();

        // Return data as JSON
        return response()->json(['data' => $data]);
    }


    public function getAllRequests()
    {
    // Fetch all requests with their related models
    $requests = Pengajuan::with(['bentukRequest', 'user'])->get();

    // Transform the data as needed
    $data = $requests->map(function ($request) {
        return [
            'id' => $request->id,
            'nama_pengaju' => $request->nama_pengaju,
            'asal_pengaju' => $request->asal_pengaju,
            'nomor_telepon_pengaju' => $request->nomor_telepon_pengaju,
            'judul_request' => $request->judul_request,
            'bentuk_request' => $request->bentukRequest ? $request->bentukRequest->name : null,
            'deadline' => $request->deadline->format('d-m-Y'),
            'required_personil' => $request->required_personil,
            'status' => $request->status,
            'email' => $request->user ? $request->user->email : null,
            'progres' => $request->project ? $request->project->progress : null
        ];
    });

    // Return data as JSON for an API response
    return response()->json(['data' => $data]);
    }

    public function delete($id)
    {
        $request = Pengajuan::find($id);

        if (!$request) {
            return response()->json(['message' => 'Not found'], 404);
        }

        // Delete all notifications associated with the pengajuan_id
        Notifikasi::where('pengajuan_id', $id)->delete();

        // Find the associated project and delete it
        $project = Project::where('request_id', $request->id)->first();
        if ($project) {
            $project->delete();
        }

        // Now delete the request
        $request->delete();

        return response()->json(['message' => 'Request, associated project, and notifications deleted successfully']);
    }

    public function show($id)
    {
        $user = Auth::user();

        $userId = auth()->user()->id;
        // Total number of requests

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','unread') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();

        $request = Pengajuan::with(['bentukRequest', 'user', 'project.users' => function ($query) {
            $query->wherePivot('konfirmasi_project', 'Ya');
        }])->find($id);

        if (!$request) {
            abort(404);
        }

        $progress = $request->project ? $request->project->progress : '-';
        $assignedPersonnel = $request->project ? $request->project->users : collect();
        $ketAdmin = $request->ket_admin; // Retrieve ket_admin

        // Check the status of Pengajuan
        if ($request->status == 'disetujui') {
            // Return a view for approved Pengajuan
            return view('user/user-detail-request-terima', compact('request', 'user', 'progress', 'assignedPersonnel', 'notifikasis', 'totalUnreadNotifications'));
        } elseif ($request->status == 'ditolak') {
            // Return a view for rejected Pengajuan
            return view('user/user-detail-request-tolak', compact('request', 'user', 'progress', 'ketAdmin', 'notifikasis', 'totalUnreadNotifications'));
        }

        // Default view for other statuses
        return view('user/user-detail-request', compact('request', 'user', 'progress', 'notifikasis', 'totalUnreadNotifications'));
    }

    public function personilKalenderShow($id)
    {
        $user = Auth::user();

        $userId = auth()->user()->id;
        // Total number of requests

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','unread') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();

        $request = Pengajuan::with(['bentukRequest', 'user', 'project.users' => function ($query) {
            $query->wherePivot('konfirmasi_project', 'Ya');
        }])->find($id);

        if (!$request) {
            abort(404);
        }

        $progress = $request->project ? $request->project->progress : '-';
        $assignedPersonel = $request->project ? $request->project->users : collect();
        $ketAdmin = $request->ket_admin; // Retrieve ket_admin

        // Default view for other statuses
        return view('personil/personil-detail-request-assigned', compact('request', 'user', 'progress', 'assignedPersonel', 'notifikasis', 'totalUnreadNotifications'));;
    }

    public function personilShow($id)
    {
        $user = Auth::user();

        $userId = auth()->user()->id;
        // Total number of requests

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','unread') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();

        $request = Pengajuan::with(['bentukRequest', 'user', 'project.users'])->find($id);

        if (!$request) {
            abort(404);
        }

        $progress = $request->project ? $request->project->progress : '-';
        $assignedPersonel = $request->project ? $request->project->users : collect();
        $ketPersonil = null;
        $konfirmasiProject = null;

        if ($request->project) {
            // Filter assignedPersonnel to include only those with konfirmasi_project 'Ya'
            $assignedPersonel = $assignedPersonel->filter(function ($user) {
                return $user->pivot->konfirmasi_project === 'Ya';
            });

            $layanan = $request->project->users->where('id', $user->id)->first();
            if ($layanan) {
                $ketPersonil = $layanan->pivot->ket_personil;
                $konfirmasiProject = $layanan->pivot->konfirmasi_project;
            }
        }

        // Check the konfirmasi project
        if ($konfirmasiProject == 'Ya') {
            // Return a view for approved Pengajuan
            return view('personil/personil-detail-request-assigned', compact('request', 'user', 'progress', 'assignedPersonel', 'notifikasis', 'totalUnreadNotifications'));
        }

        // Default view for other statuses
        return view('personil/personil-detail-request-rejected', compact('request', 'user', 'progress', 'ketPersonil', 'notifikasis', 'totalUnreadNotifications'));
    }

    public function personilProjectShow($id)
    {
        $user = Auth::user();

        $userId = auth()->user()->id;
        // Total number of requests

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','unread') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();

        $request = Pengajuan::with(['bentukRequest', 'user', 'project.users'])->find($id);

        if (!$request) {
            abort(404);
        }

        $progress = $request->project ? $request->project->progress : '-';
        $assignedPersonel = $request->project ? $request->project->users : collect();
        $ketPersonil = null;
        $konfirmasiProject = null;

        if ($request->project) {
            // Filter assignedPersonnel to include only those with konfirmasi_project 'Ya'
            $assignedPersonel = $assignedPersonel->filter(function ($user) {
                return $user->pivot->konfirmasi_project === 'Ya';
            });

            $layanan = $request->project->users->where('id', $user->id)->first();
            if ($layanan) {
                $ketPersonil = $layanan->pivot->ket_personil;
                $konfirmasiProject = $layanan->pivot->konfirmasi_project;
            }
        }

        return view('personil/personil-detail-project-selesai', compact('request', 'user', 'progress', 'assignedPersonel', 'notifikasis', 'totalUnreadNotifications'));

    }


    public function adminShow($id)
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
        $request = Pengajuan::with(['bentukRequest', 'user', 'project.users' => function ($query) {
            $query->wherePivot('konfirmasi_project', 'Ya');
        }])->find($id);

        if (!$request) {
            abort(404);
        }

        // Assuming $request->project gives you the Project related to the Pengajuan
        $progress = $request->project ? $request->project->progress : '-';
        $assignedPersonnel = $request->project ? $request->project->users : collect();
        $ketAdmin = $request->ket_admin; // Retrieve ket_admin

        // Check the status of Pengajuan
        if ($request->status == 'disetujui') {
            // Return a view for approved Pengajuan
            return view('admin/admin-detail-request-terima', compact('request', 'user', 'progress', 'assignedPersonnel', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
        } elseif ($request->status == 'ditolak') {
            // Return a view for rejected Pengajuan
            return view('admin/admin-detail-request-tolak', compact('request', 'user', 'progress', 'ketAdmin', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
        }

        return view('admin/admin-detail-request', compact('request', 'user','progress', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }

    public function viewPersonilEditForm($id)
    {
        $user = Auth::user();

        $userId = auth()->user()->id;
        // Total number of requests

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','unread') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();

        $request = Pengajuan::findOrFail($id);
        $bentukRequests = BentukRequest::all();
        return view('personil/personil-edit-request', compact('user','request','bentukRequests', 'notifikasis', 'totalUnreadNotifications'));
    }

    public function viewPersonilEditProjectForm($id)
    {
        $user = Auth::user();

        $userId = auth()->user()->id;
        // Total number of requests

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','unread') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();

        $request = Pengajuan::findOrFail($id);
        $bentukRequests = BentukRequest::all();
        return view('personil/personil-edit-project', compact('user','request','bentukRequests', 'notifikasis', 'totalUnreadNotifications'));
    }

    public function viewPersonilEditFormTolak($id)
    {
        $user = Auth::user();

        $userId = auth()->user()->id;
        // Total number of requests

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','unread') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();

        $request = Pengajuan::findOrFail($id);

        // Assuming there's a relationship named 'project' in your Pengajuan model
        $projectId = $request->project ? $request->project->id : null;

        $bentukRequests = BentukRequest::all();
        return view('personil/personil-edit-request-tolak', compact('user', 'request', 'bentukRequests', 'projectId', 'notifikasis', 'totalUnreadNotifications'));
    }


    public function viewAdminEditForm($id)
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
        $request = Pengajuan::findOrFail($id);
        return view('admin/admin-edit-request', compact('user', 'request', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }

    public function viewAdminEditFormTerima($id)
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
        $request = Pengajuan::findOrFail($id);
        return view('admin/admin-edit-request-terima', compact('user','request', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }

    public function viewAdminEditFormTolak($id)
    {
        $user = Auth::user();
        $request = Pengajuan::findOrFail($id);
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
        return view('admin/admin-edit-request-tolak', compact('user','request', 'bentukRequests', 'totalRequests', 'totalApproved', 'totalPending', 'totalRejected','notifikasis','totalUnreadNotifications'));
    }

    public function viewEditForm($id)
    {
        $user = Auth::user();
        $request = Pengajuan::findOrFail($id);
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

        $userId = auth()->user()->id;
        // Total number of requests

        $totalUnreadNotifications = Notifikasi::where('user_id', $userId)
                                            ->where('status', 'unread')
                                            ->count();

        $notifikasis = Notifikasi::with('user', 'pengajuan') // Sesuaikan relasi yang Anda miliki
                                            ->where('user_id', $userId)
                                            ->where('status','unread') // Contoh untuk mendapatkan notifikasi pengguna yang saat ini login
                                            ->latest()
                                            ->limit(10) // Batasi jumlah notifikasi yang ditampilkan
                                            ->get();

        // Assuming the IDs for Video and Liputan are known (replace with actual IDs)
        $videoId = BentukRequest::where('name', 'Video')->first()->id;
        $liputanId = BentukRequest::where('name', 'Liputan')->first()->id;

        $disabledDates = Pengajuan::whereIn('bentuk_request_id', [$videoId, $liputanId])
            ->where('status', 'disetujui')
            ->pluck('deadline')
            ->map(function ($date) {
                return $date->format('d-m-Y');
            });

        return view('user/user-edit-request', compact('user','request','bentukRequests','disabledDates', 'videoId', 'liputanId', 'notifikasis', 'totalUnreadNotifications'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_pengaju' => 'required|string|max:255|regex:/^[A-Za-z\s]+$/',
            'asal_pengaju' => 'required|in:mahasiswa,dosen,bps,lainnya',
            'nomor_telepon_pengaju' => 'required|string|max:255|regex:/^[0-9+]+$/',
            'judul_request' => 'required|string|max:255|regex:/^[A-Za-z0-9\s\-]+$/',
            'bentuk_request_id' => 'required|exists:bentuk_requests,id',
            'deadline' => 'required|date',
            'required_personil' => 'required|integer|min:1'
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        // Add the default status to the validated data
        $defaultStatus = 'pending'; // Set your default status value here
        $validatedData['status'] = $defaultStatus;
        $pengajuan->update($validatedData);

        return redirect()->route('user.list-request')->with('success', 'Request updated successfully');
    }

    public function assignPersonil(Request $request, $requestId)
    {
        // Validate the request data
        $validated = $request->validate([
            'personil' => 'required|array',
            'personil.*' => 'exists:users,id' // Assuming personil are user IDs
        ]);

        // Update the request's status
        $pengajuan = Pengajuan::findOrFail($requestId);
        $pengajuan->status = 'disetujui'; // Your status value
        $pengajuan->save();

        // Update the Project's progress to "On Going"
        $project = $pengajuan->project;
        if ($project) {
            $project->progress = Project::PROGRESS_ONGOING; // Use your constant for "On Going"
            $project->save();
        }

        // Loop through each personil and create or update Layanan entries
        foreach ($validated['personil'] as $userId) {
            // Assuming you can get the project ID associated with this request
            $projectId = $pengajuan->project->id ?? null;

            if ($projectId) {
                Layanan::updateOrCreate(
                    ['project_id' => $projectId, 'user_id' => $userId],
                    ['ket_personil' => null, 'konfirmasi_project' => null]
                );
                $project = Project::findOrFail($projectId);
                $projectTitle = $project->request->judul_request;

                $message = "Pemberitahuan Project Baru";
                $message2 = "Project dengan judul '{$projectTitle}' telah ditugaskan kepada Anda";
                Notifikasi::create([
                    'user_id' => $userId,
                    'pengajuan_id' => $requestId,
                    'message' => $message, // Customize this message
                    'message2' => $message2,
                    'status' => 'unread' // Default status
                ]);
            }
        }

        $message = "Menunggu Penerimaan Personil";
        $message2 = "Request telah dikirim kepada personil yang dipilih";
       // Notification for the user who made the request
        Notifikasi::create([
            'user_id' => $pengajuan->user_id,
            'pengajuan_id' => $requestId,
            'message' => $message, // Customize this message
            'message2' => $message2, // Customize this message
            'status' => 'unread'
        ]);

        $adminUsers = User::where('role', 'admin')->get(); // Update the query according to your role management
        foreach ($adminUsers as $admin) {
            $message = "Menunggu Penerimaan Personil";
            $message2 = "Project telah dikirim kepada personil yang dipilih";
            Notifikasi::create([
                'user_id' => $admin->id,
                'pengajuan_id' => $requestId,
                'message' => $message, // Customize this message
                'message2' => $message2,
                'status' => 'unread'
            ]);
        }

        // Redirect or return a response
        return redirect()->route('admin.list-request')->with('success', 'Personil assigned and request status updated successfully');
    }

    public function commentTolakRequest(Request $request, $requestId)
    {
        // Validate the request data
        $validated = $request->validate([
            'comment' => 'required|string' // Assuming 'comment' is the name of your textarea
        ]);

        // Retrieve the request by ID and update its status and ket_admin
        $pengajuan = Pengajuan::findOrFail($requestId);

        $judulRequest = $pengajuan->judul_request;
        $pengajuan->status = 'ditolak'; // Set the status to 'rejected' or your equivalent
        $pengajuan->ket_admin = $validated['comment']; // Save the rejection comment in ket_admin
        $pengajuan->save();

        $message = "Request ditolak";
        $message2 = "Request project dengan judul '{$judulRequest}' ditolak";

        Notifikasi::create([
            'user_id' => $pengajuan->user_id,
            'pengajuan_id' => $requestId,
            'message' => $message, // Customize this message
            'message2' => $message2,
            'status' => 'unread'
        ]);

        $adminUsers = User::where('role', 'admin')->get();
        foreach ($adminUsers as $admin) {
            $message = "Request ditolak";
            $message2 = "Request project dengan judul '{$judulRequest}' ditolak";
            Notifikasi::create([
                'user_id' => $admin->id,
                'pengajuan_id' => $requestId,
                'message' => $message, // Customize this message
                'message2' => $message2,
                'status' => 'unread'
            ]);
        }

        // Redirect or return a response
        return redirect()->route('admin.list-request')->with('success', 'Request has been rejected with a comment.');
    }

    private function updateNotifikasiStatus($pengajuan)
    {
        $notifikasi = Notifikasi::where('pengajuan_id', $pengajuan->id)->first();
        if ($notifikasi) {
            $notifikasi->update([
                'message' => 'Status Request Telah diubah!',
                'status' => 'unread'
            ]);
        }
    }

    public function markAllAsRead(){
        $userId = Auth::id(); // Get the ID of the currently authenticated user

        // Update all notifications for the user to 'read'
        Notifikasi::where('user_id', $userId)
                  ->where('status', '!=', 'read')
                  ->update(['status' => 'read']);

        return response()->json(['message' => 'All notifications marked as read']);
    }

    public function countPersonils(Request $request)
    {
        $users = User::all(); // Fetch all users

        // Count the number of users with the 'personil' role
        $personilCount = $users->filter(function ($user) {
            return $user->role == 'personil'; // Adjust this condition based on how roles are stored
        })->count();

        // Format the data for DataTables or your front-end
        $data = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role, // Assuming the role is a direct attribute
            ];
        });

        return Response::json(['data' => $data, 'personilCount' => $personilCount]);
    }

}
