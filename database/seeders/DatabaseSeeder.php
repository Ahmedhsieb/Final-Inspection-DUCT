<?php

namespace Database\Seeders;

use App\Models\InspectionParameter;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $parameter = [
            'VISUAL DEATELS',
            'SIZE',
            'JOINTS',
            'CORNER FIXING',
            'FLANGE FIXING',
            'S & C CLIPS',
            'ANGLE BAR FIXING',
            'Insulation',
            'OVER ALL WORKMANSHIP',
            'SEALANT',
            'PAINT SILVER',
            'WHITE / BLACK SPOT FOR SHEET DUCT',
            'Cleaning',
            'STIKERS',
        ];
        for ($i = 0 ; $i<count($parameter) ; $i++){
            InspectionParameter::create([
                'parameter' => $parameter[$i],
            ]);
        }

    }
}
