<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
        	['name' => 'Sucursal 1'],
        	['name' => 'Sucursal 2'],
        	['name' => 'Sucursal 3'],
        	['name' => 'Sucursal 4']
    	]);
    }
}
