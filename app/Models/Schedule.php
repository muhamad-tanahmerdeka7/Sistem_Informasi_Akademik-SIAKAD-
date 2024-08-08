<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruangan',
        'kode_absensi',
        'tahun_akademik',
        'semester',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Get the subject that owns the schedule.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the lecturer that created the schedule.
     */
    public function lecturer()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the lecturer that updated the schedule.
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the lecturer that deleted the schedule.
     */
    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
