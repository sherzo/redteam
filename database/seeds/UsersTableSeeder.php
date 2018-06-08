<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
        		'name' => 'Juan',
        		'email' => 'admin@admin.com',
        		'password' => bcrypt('admin123'),
        		'second_name' => 'David',
        		'lastname' => 'Perez',
        		'username' => 'juanperez',
        		'gender' => true,
        	],
        	[
        		'name' => 'Jesus',
        		'email' => 'empleado@empleado.com',
        		'password' => bcrypt('empleado123'),
        		'second_name' => 'Antonio',
        		'lastname' => 'Gonzalez',
        		'username' => 'jgonzalez',
        		'gender' => true,
        	],
        	[
        		'name' => 'Ana',
        		'email' => 'empleado2@empleado.com',
        		'password' => bcrypt('empleado123'),
        		'second_name' => 'Patricia',
        		'lastname' => 'Cabello',
        		'username' => 'anacabello',
        		'gender' => false,
        	]
    	]);

    	DB::table('role_user')->insert([
    		[ 
    			'user_id' => 1,
    			'role_id' => 1,
    			'user_type' => 'App\User' 
    		],
    		[ 
    			'user_id' => 2,
    			'role_id' => 2,
    			'user_type' => 'App\User'
    		],
    		[ 
    			'user_id' => 3,
    			'role_id' => 2,
    			'user_type' => 'App\User'
    		]
    	]);

    	DB::table('personal_informations')->insert([
    		[
    			'user_id' => 1,
    			'marital' => 1,
    			'address' => 'Calle bermunez',
    			'personal_email' => 'juan@gmail.com',
    			'department' => 'San Luis',
    			'town' => 'Bonalde',
    			'birthdate' => '1991-06-05' 
    		],
    		[
    			'user_id' => 2,
    			'marital' => 2,
    			'address' => 'Calle Bolivar',
    			'personal_email' => 'jesus@gmail.com',
    			'department' => 'San Luis',
    			'town' => 'Petare',
    			'birthdate' => '1997-02-03' 
    		],
    		[
    			'user_id' => 3,
    			'marital' => 1,
    			'address' => 'Calle Francisco pacheco',
    			'personal_email' => 'ana@gmail.com',
    			'department' => 'San Agustin',
    			'town' => 'Tolima',
    			'birthdate' => '1995-07-11' 
    		],
    	]);

    	DB::table('academic_informations')->insert([
    		[
    			'user_id' => 1,
    			'school' => 'Luisa caceres',
    			'technical' => 'Calle bermunez',	
    			'abilities' => 'OpenOffice, Marketing'

    		],
    		[
    			'user_id' => 2,
    			'school' => 'Luisa caceres',
    			'technical' => 'Simon Bolivar',
    			'abilities' => 'Microsoft Office'
       		],
    		[
    			'user_id' => 3,
    			'marital' => 1,
    			'technical' => 'UPTA Aragua',
    			'abilities' => 'Ventas y relaciones internacionales'

    		],
    	]);

    	DB::table('work_informations')->insert([
    		[
    			'user_id' => 1,
    			'area_id' => 2,
    			'mark_id' => 2,	 
    			'branch_id' => 3,
    			'phone' => '+5600344922',
    			'admission' => '2015-01-06',
    			'extension' => '10',
    			'position' => 'Gerente general'
    		],
    		[
    			'user_id' => 2,
    			'area_id' => 2,
    			'mark_id' => 3,	 
    			'branch_id' => 1,
    			'phone' => '+56019943',
    			'admission' => '2016-05-12',
    			'extension' => '11',
    			'position' => 'Supervisor'
    		],
    		[
    			'user_id' => 3,
    			'area_id' => 1,
    			'mark_id' => 3,	 
    			'branch_id' => 2,
    			'phone' => '+5600053432',
    			'admission' => '2017-12-09',
    			'extension' => '12',
    			'position' => 'Empleado'
    		],
    	]);
    }
}
