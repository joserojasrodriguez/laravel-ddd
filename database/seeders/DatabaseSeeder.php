<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Speeden\Models\Address;
use Speeden\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Address::factory(7)->create();
    }
}
