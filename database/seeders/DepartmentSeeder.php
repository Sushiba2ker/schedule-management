<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        // Lấy ID của trưởng bộ môn
        $headId = DB::table('users')->where('email', 'head@example.com')->first()->id;
        
        $departments = [
            [
                'name' => 'Công nghệ thông tin',
                'code' => 'CNTT',
                'description' => 'Bộ môn Công nghệ thông tin',
                'head_id' => $headId,
            ],
            [
                'name' => 'Kỹ thuật phần mềm',
                'code' => 'KTPM',
                'description' => 'Bộ môn Kỹ thuật phần mềm',
                'head_id' => null,
            ],
            [
                'name' => 'Mạng máy tính',
                'code' => 'MMT',
                'description' => 'Bộ môn Mạng máy tính',
                'head_id' => null,
            ],
            [
                'name' => 'Hệ thống thông tin',
                'code' => 'HTTT',
                'description' => 'Bộ môn Hệ thống thông tin',
                'head_id' => null,
            ],
        ];
        
        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department['name'],
                'code' => $department['code'],
                'description' => $department['description'],
                'head_id' => $department['head_id'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
