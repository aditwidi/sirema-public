<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
    protected $table = 'requests';

    // Fillable properties
    protected $fillable = [
        'user_id', 'nama_pengaju', 'asal_pengaju', 'nomor_telepon_pengaju',
        'judul_request', 'status', 'ket_admin', 'bentuk_request_id',
        'deadline', 'required_personil'
    ];

    protected $casts = [
        'deadline' => 'datetime', // Cast deadline as a datetime
    ];

    /**
     * Get the user who made the request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the bentuk request associated with the request.
     */
    public function bentukRequest()
    {
        return $this->belongsTo(BentukRequest::class, 'bentuk_request_id');
    }

    public function project()
    {
        return $this->hasOne(Project::class, 'request_id');
    }
}
