<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
               // Seeding BentukRequests
        DB::table('bentuk_requests')->insert([
            ['name' => 'Design'],
            ['name' => 'Liputan'],
            ['name' => 'Video'],
            ['name' => 'Kepenulisan'],
        ]);
    }
}
