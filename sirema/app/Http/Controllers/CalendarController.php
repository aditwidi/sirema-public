<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class CalendarController extends Controller
{
    public function userCalendar(Request $request, $user_id)
    {
        // Retrieve filters from the request, if any
        $filterStatuses = $request->input('filters', []);

        // Return an empty response if no filters are selected
        if (empty($filterStatuses)) {
            return response()->json([]);
        }

        // Query the Pengajuan model, applying filters if provided
        $query = Pengajuan::with('user');

        $query->where(function ($q) use ($filterStatuses, $user_id) {
            if (in_array('pending', $filterStatuses)) {
                $q->orWhere(function ($query) use ($user_id) {
                    $query->where('status', 'Pending')->where('user_id', $user_id);
                });
            }

            if (in_array('ditolak', $filterStatuses)) {
                $q->orWhere(function ($query) use ($user_id) {
                    $query->where('status', 'Ditolak')->where('user_id', $user_id);
                });
            }

            if (in_array('disetujui', $filterStatuses)) {
                $q->orWhere('status', 'Disetujui');
            }
        });

        $requests = $query->get();

        // Transform the data as needed for the calendar
        $events = $requests->map(function ($request) {
            return [
                'id' => $request->id,
                'title' => $request->judul_request,
                'start' => $request->deadline,
                'status' => $request->status,
                'nama_pengaju' => $request->nama_pengaju,
                'asal_pengaju' => $request->asal_pengaju,
                'nomor_telepon_pengaju' => $request->nomor_telepon_pengaju,
                'bentuk_request_id' => $request->bentuk_request_id,
                'required_personil' => $request->required_personil,
            ];
        });

        return response()->json($events);
    }

    public function personilCalendar(Request $request, $user_id)
    {
        // Retrieve filters from the request, if any
        $filterStatuses = $request->input('filters', []);
        $includeUserProjects = in_array('projectAnda', $filterStatuses); // Check if 'Project Anda' is selected

        // If no filters are selected, return an empty response
        if (empty($filterStatuses)) {
            return response()->json([]);
        }

        // Start the query
        $query = Pengajuan::with('user');

        if (!empty($filterStatuses)) {
            $query->where(function ($q) use ($filterStatuses, $user_id, $includeUserProjects) {
                if (in_array('disetujui', $filterStatuses)) {
                    $q->orWhere('status', 'Disetujui');
                }

                if ($includeUserProjects) {
                    $q->orWhereHas('project.users', function ($query) use ($user_id) {
                        $query->where('users.id', $user_id)
                              ->where('layanans.konfirmasi_project', 'Ya');
                    });
                }
            });
        }

        $requests = $query->get();

        // Transform the data as needed for the calendar
        $events = $requests->map(function ($request) use ($includeUserProjects, $user_id) {
            $isUserProject = false;
            if ($includeUserProjects && $request->project) {
                // Access the users through the project and check the pivot field
                foreach ($request->project->users as $user) {
                    if ($user->id == $user_id && $user->pivot->konfirmasi_project == 'Ya') {
                        $isUserProject = true;
                        break;
                    }
                }
            }

            $eventType = $isUserProject ? 'projectAnda' : 'regular';

            return [
                'id' => $request->id,
                'title' => $request->judul_request,
                'start' => $request->deadline,
                'status' => $request->status,
                'nama_pengaju' => $request->nama_pengaju,
                'asal_pengaju' => $request->asal_pengaju,
                'nomor_telepon_pengaju' => $request->nomor_telepon_pengaju,
                'bentuk_request_id' => $request->bentuk_request_id,
                'required_personil' => $request->required_personil,
                'type' => $eventType,
            ];
        });

        return response()->json($events);
    }


    public function adminCalendar(Request $request)
    {
        // Retrieve filters from the request, if any
        $filterStatuses = $request->input('filters', []);

        // Return an empty response if no filters are selected
        if (empty($filterStatuses)) {
            return response()->json([]);
        }

        // Query the Pengajuan model, applying filters if provided
        $query = Pengajuan::with('user');

        $query->where(function ($q) use ($filterStatuses) {
            if (in_array('pending', $filterStatuses)) {
                $q->orWhere('status', 'Pending');
            }

            if (in_array('ditolak', $filterStatuses)) {
                $q->orWhere('status', 'Ditolak');
            }

            if (in_array('disetujui', $filterStatuses)) {
                $q->orWhere('status', 'Disetujui');
            }
        });

        $requests = $query->get();

        // Transform the data as needed for the calendar
        $events = $requests->map(function ($request) {
            return [
                'id' => $request->id,
                'title' => $request->judul_request,
                'start' => $request->deadline,
                'status' => $request->status,
                'nama_pengaju' => $request->nama_pengaju,
                'asal_pengaju' => $request->asal_pengaju,
                'nomor_telepon_pengaju' => $request->nomor_telepon_pengaju,
                'bentuk_request_id' => $request->bentuk_request_id,
                'required_personil' => $request->required_personil,
            ];
        });

        return response()->json($events);
    }

}
