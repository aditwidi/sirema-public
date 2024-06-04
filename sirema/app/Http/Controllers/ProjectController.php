<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BentukRequest;
use App\Models\Notifikasi;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function selesaikanProject($projectId)
    {
        // Assuming you have a logged-in user who is a personnel
        $userId = Auth::id();

        // Find the project
        $project = Project::findOrFail($projectId);

        // Check if the logged-in user is associated with the project
        // This step is optional but adds an additional layer of security
        if($project->users()->where('users.id', $userId)->exists()) {
            // Update the progress of the project to 'Selesai'
            $project->progress = Project::PROGRESS_COMPLETED;
            $project->save();

            $projectTitle = $project->request->judul_request;

            $message = "Request Telah Selesai";
            $message2 = "Request '{$projectTitle}' telah diselesaikan";

            Notifikasi::create([
                'user_id' => $project->request->user_id, // Assuming this is how you get the user who made the request
                'pengajuan_id' => $projectId,
                'message' => $message,
                'message2' => $message2,
                'status' => 'unread'
            ]);

            $adminUsers = User::where('role', 'admin')->get(); // Adjust this based on your role management
            foreach ($adminUsers as $admin) {
                $message = "Request Telah Selesai";
                $message2 = "Request '{$projectTitle}' telah diselesaikan";
                Notifikasi::create([
                    'user_id' => $admin->id,
                    'pengajuan_id' => $projectId,
                    'message' => $message,
                    'message2' => $message2,
                    'status' => 'unread'
                ]);
            }


            // Redirect or return a response
            return redirect()->route('project.list')->with('success', 'Project completed successfully!');
        }

        // Handle cases where the user is not associated with the project
        return back()->with('error', 'Unauthorized action.');
    }

    public function terimaProject($projectId)
    {
        // Assuming you have a logged-in user who is a personnel
        $userId = Auth::id();
        $user = Auth::user();

        // Find the project and check if the user is associated with it
        $project = Project::whereHas('users', function ($query) use ($userId) {
            $query->where('layanans.user_id', $userId);
        })->findOrFail($projectId);

        // Update the konfirmasi_project in layanan table
        $project->users()->updateExistingPivot($userId, ['konfirmasi_project' => 'Ya']);

        // Optionally, update other project properties or handle additional logic
        

        $projectTitle = $project->request->judul_request; // Replace 'title' with your actual field name
        $userName = $user->name; // Replace 'name' with your actual field name for the user

        $adminUsers = User::where('role', 'admin')->get(); // Update the query according to your role management

        $message = "Project diterima";
        $message2 = "Project '{$projectTitle}' telah diterima oleh {$userName}"; // Customize this message
    
        foreach ($adminUsers as $admin) {
            Notifikasi::create([
                'user_id' => $admin->id,
                'pengajuan_id' => $projectId,
                'message' => $message,
                'message2' => $message2,
                'status' => 'unread' // Default status
            ]);
        }

        $message3 = "Project Diterima";
        $message4 = "Project '{$projectTitle}' telah diterima oleh {$userName}";
        Notifikasi::create([
            'user_id' => $project->request->user_id, // User who made the request
            'pengajuan_id' => $projectId,
            'message' => $message3,
            'message2' => $message4,
            'status' => 'unread'
        ]);
        // Redirect or return a response
        return redirect()->route('personil.list-request')->with('success', 'Project accepted successfully!');
    }

    public function tolakProject($projectId, Request $request)
    {
        $userId = Auth::id();
        $user = Auth::user();
        $comment = $request->input('comment'); // Get the comment from the request

        // Find the project and check if the user is associated with it
        $project = Project::whereHas('users', function ($query) use ($userId) {
            $query->where('layanans.user_id', $userId);
        })->findOrFail($projectId);

        $projectTitle = $project->request->judul_request;
        $userName = $user->name;

        // Update the konfirmasi_project in layanan table to "Tidak" and ket_personil with the comment
        $project->users()->updateExistingPivot($userId, [
            'konfirmasi_project' => 'Tidak',
            'ket_personil' => $comment
        ]);

        $message = "Project ditolak";
        $message2 = "Project '{$projectTitle}' ditolak oleh {$userName}";
        $adminUsers = User::where('role', 'admin')->get(); // Adjust the query based on your role management system
        foreach ($adminUsers as $admin) {
            Notifikasi::create([
                'user_id' => $admin->id,
                'pengajuan_id' => $projectId, // Assuming pengajuan_id refers to the project ID
                'message' => $message,
                'message2' => $message2,
                'status' => 'unread'
            ]);
        }
        // Redirect or return a response
        return redirect()->route('personil.list-request')->with('success', 'Project declined successfully!');
    }
}
