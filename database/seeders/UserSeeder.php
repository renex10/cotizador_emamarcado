<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class UserSeeder extends Seeder
{
  /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario con credenciales específicas
        User::create([
            'name' => 'rene riquelme',
            'email' => 'reneprh2013@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('pangaleluney2013'),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'current_team_id' => null,
            'profile_photo_path' => null,
        ]);

        // 49 usuarios falsos
        $faker = Faker::create();
        for ($i = 0; $i < 49; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => $faker->dateTime,
                'password' => bcrypt('password123'),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'current_team_id' => null,
                'profile_photo_path' => null,
            ]);
        }
    }
}
