<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        $rooms = [
            // Phòng lý thuyết
            [
                'name' => 'Phòng 101',
                'code' => 'P101',
                'type' => 'theory',
                'capacity' => 60,
                'equipment' => 'Máy chiếu, bảng, điều hòa',
            ],
            [
                'name' => 'Phòng 102',
                'code' => 'P102',
                'type' => 'theory',
                'capacity' => 60,
                'equipment' => 'Máy chiếu, bảng, điều hòa',
            ],
            [
                'name' => 'Phòng 103',
                'code' => 'P103',
                'type' => 'theory',
                'capacity' => 80,
                'equipment' => 'Máy chiếu, bảng, điều hòa',
            ],
            // Phòng thực hành
            [
                'name' => 'Phòng thực hành 201',
                'code' => 'PTH201',
                'type' => 'practice',
                'capacity' => 40,
                'equipment' => '40 máy tính, máy chiếu, điều hòa',
            ],
            [
                'name' => 'Phòng thực hành 202',
                'code' => 'PTH202',
                'type' => 'practice',
                'capacity' => 40,
                'equipment' => '40 máy tính, máy chiếu, điều hòa',
            ],
            // Phòng đa chức năng
            [
                'name' => 'Phòng 301',
                'code' => 'P301',
                'type' => 'both',
                'capacity' => 50,
                'equipment' => '25 máy tính, máy chiếu, bảng, điều hòa',
            ],
        ];
        
        foreach ($rooms as $room) {
            DB::table('rooms')->insert([
                'name' => $room['name'],
                'code' => $room['code'],
                'type' => $room['type'],
                'capacity' => $room['capacity'],
                'equipment' => $room['equipment'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
