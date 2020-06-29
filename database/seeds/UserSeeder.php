<?php

use App\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	Storage::deleteDirectory('public/pic/');
    	Storage::makeDirectory('public/pic/');


    	//DB::table('roles')->truncate();
    	//DB::table('users')->truncate();

        Role::create([
        	'role'=>'Administrador',
        	'description'=>'El que lo controla todo'
        ]);

        Role::create([
        	'role'=>'Gestor',
        	'description'=>'El que lo controla todo'
        ]);
        Role::create([
        	'role'=>'Invitado',
        	'description'=>'El que lo controla todo'
        ]);

        factory(User::class, 5)->create([])->each(function ($user) {
	        $user->roles()->attach(1);
	    });
/*
	    factory(User::class, 15)->create([])->each(function ($user) {
	        $user->roles()->attach(2);
	    });
	   	factory(User::class, 25)->create([])->each(function ($user) {
	        $user->roles()->attach(3);
	    });*/

    }
}
