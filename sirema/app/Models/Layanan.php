<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'project_id', 'ket_personil', 'konfirmasi_project'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function layanans()
    {
        return $this->hasMany(Layanan::class, 'project_id');
    }
}
