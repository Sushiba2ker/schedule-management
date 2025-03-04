<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy role IDs
        $adminRoleId = DB::table('roles')->where('slug', 'admin')->first()->id;
        $teacherRoleId = DB::table('roles')->where('slug', 'teacher')->first()->id;
        $departmentHeadRoleId = DB::table('roles')->where('slug', 'department_head')->first()->id;
        $secretaryRoleId = DB::table('roles')->where('slug', 'secretary')->first()->id;

        // Tạo tài khoản Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRoleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo tài khoản Giảng viên
        DB::table('users')->insert([
            'name' => 'Nguyễn Văn A',
            'email' => 'teacher1@example.com',
            'password' => Hash::make('password'),
            'role_id' => $teacherRoleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo tài khoản Trưởng bộ môn
        DB::table('users')->insert([
            'name' => 'Trần Thị B',
            'email' => 'head1@example.com',
            'password' => Hash::make('password'),
            'role_id' => $departmentHeadRoleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo tài khoản Thư ký
        DB::table('users')->insert([
            'name' => 'Lê Văn C',
            'email' => 'secretary1@example.com',
            'password' => Hash::make('password'),
            'role_id' => $secretaryRoleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
