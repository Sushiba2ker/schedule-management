<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $currentYear = $now->year;
        
        $academicYears = [
            [
                'name' => 'Năm học ' . ($currentYear - 1) . '-' . $currentYear,
                'start_date' => Carbon::create($currentYear - 1, 9, 1),
                'end_date' => Carbon::create($currentYear, 5, 31),
                'is_current' => false,
            ],
            [
                'name' => 'Năm học ' . $currentYear . '-' . ($currentYear + 1),
                'start_date' => Carbon::create($currentYear, 9, 1),
                'end_date' => Carbon::create($currentYear + 1, 5, 31),
                'is_current' => true,
            ],
        ];
        
        foreach ($academicYears as $academicYear) {
            DB::table('academic_years')->insert([
                'name' => $academicYear['name'],
                'start_date' => $academicYear['start_date'],
                'end_date' => $academicYear['end_date'],
                'is_current' => $academicYear['is_current'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
