<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

        // The table associated with the model.
        protected $table = 'projects';

        // The attributes that are mass assignable.
        protected $fillable = ['progress', 'request_id'];

        // Enum values for 'progress'
        const PROGRESS_ONGOING = 'On Going';
        const PROGRESS_COMPLETED = 'Selesai';
        const PROGRESS_NONE = '-';

        // Relationship with Request model (assuming you have a Request model)
        public function request()
        {
            return $this->belongsTo(Pengajuan::class, 'request_id');
        }

        public function users()
        {
            return $this->belongsToMany(User::class, 'layanans')->withPivot(['ket_personil', 'konfirmasi_project']);
        }
}
