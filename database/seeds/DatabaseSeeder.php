<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(MarksTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
    }
}
