<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'lecturer_id',
        'semesters',
        'academic_year',
        'sks',
        'code',
        'description',
    ];

    /**
     * Get the lecturer that owns the subject.
     */
    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    /**
     * Get the schedules for the subject.
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
