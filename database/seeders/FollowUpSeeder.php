<?php

namespace Database\Seeders;

use App\Models\Followup;
use Database\Factories\FollowUpFactory;
use Illuminate\Database\Seeder;

class FollowUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Followup::factory(150)->create();
    }
}
