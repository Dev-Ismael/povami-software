<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Affiliator;


class AffiliatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Affiliator::factory()->count(10)->create();

    }
}
