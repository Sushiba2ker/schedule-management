<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubjectSeeder extends Seeder
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
        
        $subjects = [
            // CNTT
            [
                'name' => 'Lập trình cơ bản',
                'code' => 'LTCB',
                'department_id' => $cnttId,
                'credits' => 3,
                'has_practice' => true,
                'description' => 'Môn học cơ bản về lập trình',
            ],
            [
                'name' => 'Cấu trúc dữ liệu và giải thuật',
                'code' => 'CTDL',
                'department_id' => $cnttId,
                'credits' => 4,
                'has_practice' => true,
                'description' => 'Môn học về cấu trúc dữ liệu và giải thuật',
            ],
            // KTPM
            [
                'name' => 'Kỹ thuật phần mềm',
                'code' => 'KTPM01',
                'department_id' => $ktpmId,
                'credits' => 3,
                'has_practice' => true,
                'description' => 'Môn học về quy trình phát triển phần mềm',
            ],
            [
                'name' => 'Kiểm thử phần mềm',
                'code' => 'KTPM02',
                'department_id' => $ktpmId,
                'credits' => 3,
                'has_practice' => true,
                'description' => 'Môn học về kiểm thử phần mềm',
            ],
            // MMT
            [
                'name' => 'Mạng máy tính',
                'code' => 'MMT01',
                'department_id' => $mmtId,
                'credits' => 3,
                'has_practice' => true,
                'description' => 'Môn học về mạng máy tính',
            ],
            [
                'name' => 'An toàn mạng',
                'code' => 'ATM',
                'department_id' => $mmtId,
                'credits' => 3,
                'has_practice' => true,
                'description' => 'Môn học về an toàn mạng',
            ],
            // HTTT
            [
                'name' => 'Cơ sở dữ liệu',
                'code' => 'CSDL',
                'department_id' => $htttId,
                'credits' => 3,
                'has_practice' => true,
                'description' => 'Môn học về cơ sở dữ liệu',
            ],
            [
                'name' => 'Phân tích thiết kế hệ thống',
                'code' => 'PTTKHT',
                'department_id' => $htttId,
                'credits' => 3,
                'has_practice' => false,
                'description' => 'Môn học về phân tích và thiết kế hệ thống',
            ],
        ];
        
        foreach ($subjects as $subject) {
            DB::table('subjects')->insert([
                'name' => $subject['name'],
                'code' => $subject['code'],
                'department_id' => $subject['department_id'],
                'credits' => $subject['credits'],
                'has_practice' => $subject['has_practice'],
                'description' => $subject['description'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
