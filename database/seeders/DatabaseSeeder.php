<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();

        User::factory()->create([
            'name' => 'Edouard',
            'email' => 'edouard@gmail.com',
         ]);
        $this->call(ProductSeeder::class);
    }
}
