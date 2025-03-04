<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        // Lấy department IDs
        $cnttId = DB::table('departments')->where('code', 'CNTT')->first()->id;
        $ktpmId = DB::table('departments')->where('code', 'KTPM')->first()->id;
        $mmtId = DB::table('departments')->where('code', 'MMT')->first()->id;
        $htttId = DB::table('departments')->where('code', 'HTTT')->first()->id;
        
        // Lấy user IDs của giảng viên
        $teacherEmails = [
            'teacher1@example.com',
            'teacher2@example.com',
            'teacher3@example.com',
            'teacher4@example.com',
            'teacher5@example.com',
        ];
        
        $teacherUsers = DB::table('users')
            ->whereIn('email', $teacherEmails)
            ->get();
        
        $departments = [$cnttId, $ktpmId, $mmtId, $htttId];
        $qualifications = ['bachelor', 'master', 'phd', 'engineer'];
        $teachingTypes = ['theory', 'practice', 'both'];
        
        foreach ($teacherUsers as $index => $user) {
            $departmentId = $departments[$index % count($departments)];
            $qualification = $qualifications[$index % count($qualifications)];
            $teachingType = $teachingTypes[$index % count($teachingTypes)];
            
            DB::table('teachers')->insert([
                'user_id' => $user->id,
                'department_id' => $departmentId,
                'employee_code' => 'GV' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'qualification' => $qualification,
                'teaching_type' => $teachingType,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
