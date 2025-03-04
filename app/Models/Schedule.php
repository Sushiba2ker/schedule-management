<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'teacher_id',
        'room_id',
        'semester_id',
        'class_code',
        'group_code',
        'practice_group_code',
        'day_of_week',
        'start_period',
        'number_of_periods',
        'weeks_list',
        'start_week',
        'end_week',
        'session_type',
        'registered_students'
    ];

    protected $casts = [
        'day_of_week' => 'integer',
        'start_period' => 'integer',
        'number_of_periods' => 'integer',
        'start_week' => 'integer',
        'end_week' => 'integer',
        'registered_students' => 'integer',
        'session_type' => 'string',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function getEndPeriodAttribute()
    {
        return $this->start_period + $this->number_of_periods - 1;
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

    public function getTimeRangeAttribute()
    {
        return "Tiết {$this->start_period} - {$this->end_period}";
    }

    public function getWeeksListArrayAttribute()
    {
        return explode(',', $this->weeks_list);
    }

    public function hasConflictWith(Schedule $other)
    {
        // Kiểm tra xung đột thời gian
        if ($this->day_of_week !== $other->day_of_week) {
            return false;
        }

        // Kiểm tra xung đột tiết học
        $thisStart = $this->start_period;
        $thisEnd = $this->start_period + $this->number_of_periods - 1;
        $otherStart = $other->start_period;
        $otherEnd = $other->start_period + $other->number_of_periods - 1;

        if ($thisEnd < $otherStart || $thisStart > $otherEnd) {
            return false;
        }

        // Kiểm tra xung đột tuần học
        $thisWeeks = $this->getWeeksListArrayAttribute();
        $otherWeeks = $other->getWeeksListArrayAttribute();
        
        $commonWeeks = array_intersect($thisWeeks, $otherWeeks);
        
        return !empty($commonWeeks);
    }
}
