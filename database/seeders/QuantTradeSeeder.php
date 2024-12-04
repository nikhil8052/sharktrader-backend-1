<?php

namespace Database\Seeders;

use App\Models\QuantTrade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuantTradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuantTrade::factory()->count(10)->create();
    }
}
