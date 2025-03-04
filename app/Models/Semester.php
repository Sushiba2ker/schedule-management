<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'academic_year_id', 
        'start_date', 
        'end_date', 
        'is_current'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
    ];

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function availableTimes()
    {
        return $this->hasMany(AvailableTime::class);
    }

    public static function current()
    {
        return self::where('is_current', true)->first();
    }

    public function scopeCurrent($query)
    {
        return $query->where('is_current', true);
    }
}
