<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'display_name' => 'Administrador',
                'description' => 'Usuario con mas privilegios del sistemas'
            ],
        	[
        		'name' => 'employee',
        		'display_name' => 'Empleado',
        		'description' => 'Usuario comun del sistema'
        	],
    	]);
    }
}
