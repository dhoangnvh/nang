<?php

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
        $this->call(UserSeeder::class);
        $this->call(FakeUser::class);
        $this->call(Languages::class);
        $this->call(RequestTranslateTypeSeed::class);
        $this->call(CategorySeeder::class);
    }
}
