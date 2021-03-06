<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,            
            CreateSuperAdminUserSeeder::class,
            CreateAdminUserSeeder::class,
            CreateAgenUserSeeder::class,
            ContactSeeder::class,
            TaskSeeder::class,
            FollowUpSeeder::class,
          ]);
    }
}
