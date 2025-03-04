<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'department_id', 
        'employee_code', 
        'qualification', 
        'teaching_type'
    ];

    protected $casts = [
        'qualification' => 'string',
        'teaching_type' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subjects')
                    ->withTimestamps();
    }

    public function availableTimes()
    {
        return $this->hasMany(AvailableTime::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function getFullNameAttribute()
    {
        return $this->user->name;
    }

    public function getEmailAttribute()
    {
        return $this->user->email;
    }
}
