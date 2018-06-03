<?php

use Illuminate\Database\Seeder;

class MarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marks')->insert([
        	['name' => 'Marca 1'],
        	['name' => 'Marca 2'],
        	['name' => 'Marca 3'],
        	['name' => 'Marca 4']
    	]);
    }
}
