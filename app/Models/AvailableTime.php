<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id', 
        'semester_id', 
        'day_of_week', 
        'start_time', 
        'end_time', 
        'session_type'
    ];

    protected $casts = [
        'day_of_week' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'session_type' => 'string',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function getDayNameAttribute()
    {
        $days = [
            1 => 'Thứ Hai',
            2 => 'Thứ Ba',
            3 => 'Thứ Tư',
            4 => 'Thứ Năm',
            5 => 'Thứ Sáu',
            6 => 'Thứ Bảy',
            7 => 'Chủ Nhật',
        ];

        return $days[$this->day_of_week] ?? '';
    }
}
