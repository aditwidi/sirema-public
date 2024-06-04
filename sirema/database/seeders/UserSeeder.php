<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = ['Videografi', 'Reportase dan Kepenulisan', 'Fotografi', 'Design Grafis'];
        $totalUsers = 10;
        $usersPerDivision = intdiv($totalUsers, count($divisions));

        foreach ($divisions as $division) {
            for ($i = 1; $i <= $usersPerDivision; $i++) {
                User::create([
                    'name' => 'Personil ' . $division . ' ' . $i,
                    'email' => strtolower(str_replace(' ', '', $division)) . $i . '@example.com',
                    'password' => bcrypt('password'), // Default password, change as needed
                    'role' => 'personil',
                    'divisi' => $division,
                ]);
            }
        }

        // If total users is not exactly divisible by the number of divisions,
        // create the remaining users in the last division
        $remainingUsers = $totalUsers % count($divisions);
        if ($remainingUsers > 0) {
            $lastDivision = end($divisions);
            for ($i = $usersPerDivision + 1; $i <= $usersPerDivision + $remainingUsers; $i++) {
                User::create([
                    'name' => 'Personil ' . $lastDivision . ' ' . $i,
                    'email' => strtolower(str_replace(' ', '', $lastDivision)) . $i . '@example.com',
                    'password' => bcrypt('password'),
                    'role' => 'personil',
                    'divisi' => $lastDivision,
                ]);
            }
        }
    }

}
