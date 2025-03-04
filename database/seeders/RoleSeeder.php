<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Quản trị viên hệ thống',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Giảng viên',
                'slug' => 'teacher',
                'description' => 'Giảng viên trong trường',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Trưởng bộ môn',
                'slug' => 'department_head',
                'description' => 'Trưởng bộ môn',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Thư ký',
                'slug' => 'secretary',
                'description' => 'Thư ký khoa/bộ môn',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}