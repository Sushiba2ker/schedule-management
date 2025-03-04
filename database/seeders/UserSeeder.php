<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        // Lấy IDs của các roles
        $adminRoleId = DB::table('roles')->where('slug', 'admin')->first()->id;
        $teacherRoleId = DB::table('roles')->where('slug', 'teacher')->first()->id;
        $departmentHeadRoleId = DB::table('roles')->where('slug', 'department_head')->first()->id;
        $secretaryRoleId = DB::table('roles')->where('slug', 'secretary')->first()->id;
        
        // Tạo Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRoleId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        
        // Tạo Trưởng bộ môn
        DB::table('users')->insert([
            'name' => 'Trần Văn A',
            'email' => 'head@example.com',
            'password' => Hash::make('password'),
            'role_id' => $departmentHeadRoleId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        
        // Tạo Thư ký
        DB::table('users')->insert([
            'name' => 'Nguyễn Thị B',
            'email' => 'secretary@example.com',
            'password' => Hash::make('password'),
            'role_id' => $secretaryRoleId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        
        // Tạo các giảng viên
        $teachers = [
            [
                'name' => 'Lê Văn C',
                'email' => 'teacher1@example.com',
            ],
            [
                'name' => 'Phạm Thị D',
                'email' => 'teacher2@example.com',
            ],
            [
                'name' => 'Hoàng Văn E',
                'email' => 'teacher3@example.com',
            ],
            [
                'name' => 'Trần Thị F',
                'email' => 'teacher4@example.com',
            ],
            [
                'name' => 'Nguyễn Văn G',
                'email' => 'teacher5@example.com',
            ],
        ];
        
        foreach ($teachers as $teacher) {
            DB::table('users')->insert([
                'name' => $teacher['name'],
                'email' => $teacher['email'],
                'password' => Hash::make('password'),
                'role_id' => $teacherRoleId,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
