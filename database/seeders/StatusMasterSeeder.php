<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterData\StatusMaster;

class StatusMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\StatusMaster::create([
            'status_id'	=> 1,
            'name'	=> '',
            'description'	=> '-',
            'lang'	=> 1,
            'lang_id'	=> 1, 
        ]);
    }
}
