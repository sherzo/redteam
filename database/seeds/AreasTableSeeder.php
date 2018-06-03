<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
        	['name' => 'Administrativa'],
        	['name' => 'Contaduría'],
        	['name' => 'Informática'],
        	['name' => 'Gerencia'],
        	['name' => 'Supervisor'],
        	['name' => 'Vendedor']
    	]);
    }
}
