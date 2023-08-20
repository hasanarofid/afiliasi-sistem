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
        $this->call(
            [
                UserTableSeeder::class,
            // ProfilesTableSeeder::class,
            // ProductsTableSeeder::class,
            // StocksTableSeeder::class,
            // RemindersTableSeeder::class,
            // MarketplaceTableSeeder::class,
            // RekeningTableSeeder::class
            ]);
        // \App\Models\User::factory(10)->create();
    }
}
