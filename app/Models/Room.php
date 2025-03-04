<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'type', 'capacity', 'equipment'];

    protected $casts = [
        'capacity' => 'integer',
        'type' => 'string',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function isAvailable($day, $start_period, $number_of_periods, $semester_id, $exclude_schedule_id = null)
    {
        $start_time = $start_period;
        $end_time = $start_period + $number_of_periods - 1;

        $query = $this->schedules()
            ->where('day_of_week', $day)
            ->where('semester_id', $semester_id)
            ->where(function ($query) use ($start_time, $end_time) {
                $query->whereBetween('start_period', [$start_time, $end_time])
                    ->orWhereBetween(
                        \DB::raw('start_period + number_of_periods - 1'), 
                        [$start_time, $end_time]
                    )
                    ->orWhere(function ($query) use ($start_time, $end_time) {
                        $query->where('start_period', '<', $start_time)
                            ->where(
                                \DB::raw('start_period + number_of_periods - 1'), 
                                '>', 
                                $end_time
                            );
                    });
            });

        if ($exclude_schedule_id) {
            $query->where('id', '!=', $exclude_schedule_id);
        }

        return $query->count() === 0;
    }
}
