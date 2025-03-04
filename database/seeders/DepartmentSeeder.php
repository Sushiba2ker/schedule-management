<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy user ID của trưởng bộ môn
        $headId = DB::table('users')
            ->where('email', 'head1@example.com')
            ->first()->id;

        DB::table('departments')->insert([
            [
                'name' => 'Công nghệ thông tin',
                'code' => 'CNTT',
                'description' => 'Bộ môn Công nghệ thông tin',
                'head_id' => $headId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kỹ thuật phần mềm',
                'code' => 'KTPM',
                'description' => 'Bộ môn Kỹ thuật phần mềm',
                'head_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mạng máy tính',
                'code' => 'MMT',
                'description' => 'Bộ môn Mạng máy tính',
                'head_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
