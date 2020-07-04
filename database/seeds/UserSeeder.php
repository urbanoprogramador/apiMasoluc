<?php

use App\User;
use App\Models\Role;
use App\Models\Address;
use App\Models\Permission;
use App\Models\SocialNetwork;
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


        $data=[
            [
                "id"=> 1,
                "name"=> 'accessToAdminModule',
                "level"=> 1,
                "title"=> 'Modulo de administracion'
            ],
            [
                "id"=> 2,
                "name"=> 'accessToSearchModule',
                "level"=> 1,
                "title"=> 'Modulo de busqueda'
            ],
            [
                "id"=> 3,
                "name"=> 'accessToCRMModule',
                "level"=> 1,
                "title"=> 'Modulo CRM'
            ],
            [
                "id"=> 4,
                "name"=> 'canReadAdminData',
                "level"=> 2,
                "parent_id"=> 1,
                "title"=> 'Leer'
            ],
            [
                "id"=> 5,
                "name"=> 'canEditAdminData',
                "level"=> 2,
                "parent_id"=> 1,
                "title"=> 'Editar'
            ],
            [
                "id"=> 6,
                "name"=> 'canDeleteAdminData',
                "level"=> 2,
                "parent_id"=> 1,
                "title"=> 'Eliminar'
            ],
            [
                "id"=> 7,
                "name"=> 'canReadSearchData',
                "level"=> 2,
                "parent_id"=> 2,
                "title"=> 'Leer'
            ],
            [
                "id"=> 8,
                "name"=> 'canEditSearchData',
                "level"=> 2,
                "parent_id"=> 2,
                "title"=> 'Editar'
            ],
            [
                "id"=> 9,
                "name"=> 'canDeleteSearchData',
                "level"=> 2,
                "parent_id"=> 2,
                "title"=> 'Eliminar'
            ],
            [
                "id"=> 10,
                "name"=> 'canReadCRMData',
                "level"=> 2,
                "parent_id"=> 3,
                "title"=> 'Leer'
            ],
            [
                "id"=> 11,
                "name"=> 'canEditCRMData',
                "level"=> 2,
                "parent_id"=> 3,
                "title"=> 'Editar'
            ],
            [
                "id"=> 12,
                "name"=> 'canDeleteCRMData',
                "level"=> 2,
                "parent_id"=> 3,
                "title"=> 'Eliminar'
            ],
        ];
        DB::unprepared('SET IDENTITY_INSERT permissions ON');
        foreach ($data as $key => $value) {
            # code...
            Permission::create(
                $value
            );
        }
        DB::unprepared('SET IDENTITY_INSERT permissions OFF');

    	//DB::table('roles')->truncate();
    	//DB::table('users')->truncate();
        $role=Role::create([
        	'title'=>'Administrador',
        	//'description'=>'El que lo controla todo'
        ]);
        $role->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);

        $role=Role::create([
        	'title'=>'Gestor',
        	//'description'=>'El que lo controla todo'
        ]);
        $role->permissions()->attach([3, 4, 10]);
        Role::create([
        	'title'=>'Invitado',
        ]);


        $addres=[
         [
            "address_line"=> 'L-12-20 Vertex, Cybersquare',
            "city"=> 'San Francisco',
            "state"=> 'California',
            "post_code"=> '45000'
        ],
        [
            "address_line"=> '3487  Ingram Road',
            "city"=> 'Greensboro',
            "state"=> 'North Carolina',
            "post_code"=> '27409'
        ],
        [
            "address_line"=> '3487  Ingram Road',
            "city"=> 'Greensboro',
            "state"=> 'North Carolina',
            "post_code"=> '27409'
        ],
    ];






    factory(User::class, 1)->create([])->each(function ($user) use ($addres) {
     $user->roles()->attach(1);
     $user->username='administrador';
     $user->fullname='Heriberto';
     $user->occupation='ceo';
     $user->companyName= 'Masoluc';
     $user->password=Hash::make('masoluc');
     $user->email="admin@masoluc.com";
     $user->phone= '456669067890';
     $user->pic="public/pic2/Heriberto.jpeg";
     $user->save();
     $face= [
        "linkedin"=>'https://linkedin.com/'.$user->fullname,
        "facebook"=>'https://facebook.com/'.$user->fullname,
        "twitter"=>'https://twitter.com/'.$user->fullname,
        "instagram"=> 'https://instagram.com/'.$user->fullname
    ];

    $user->socialNetwork()->save(new SocialNetwork($face));
    $user->address()->save(new Address($addres[rand(0,2)]));

});



    factory(User::class, 1)->create([])->each(function ($user) use ($addres) {
     $user->roles()->attach(1);
     $user->username='juan';
     $user->fullname='Juan';
     $user->occupation='sistema';
     $user->companyName= 'Masoluc';
     $user->password=Hash::make('masoluc');
     $user->email="juan@masoluc.com";
     $user->phone= '456669067890';
     $user->pic="public/pic2/juan.jpeg";
     $user->save();
     $face= [
        "linkedin"=>'https://linkedin.com/'.$user->fullname,
        "facebook"=>'https://facebook.com/'.$user->fullname,
        "twitter"=>'https://twitter.com/'.$user->fullname,
        "instagram"=> 'https://instagram.com/'.$user->fullname
    ];

    $user->socialNetwork()->save(new SocialNetwork($face));
    $user->address()->save(new Address($addres[rand(0,2)]));

});
    factory(User::class, 1)->create([])->each(function ($user) use ($addres) {
     $user->roles()->attach(1);
     $user->username='ever';
     $user->fullname='Ever';
     $user->occupation='sistema';
     $user->companyName= 'Masoluc';
     $user->password=Hash::make('masoluc');
     $user->email="ever@masoluc.com";
     $user->phone= '456669067890';
     $user->pic="public/pic2/ever.jpeg";
     $user->save();
     $face= [
        "linkedin"=>'https://linkedin.com/'.$user->fullname,
        "facebook"=>'https://facebook.com/'.$user->fullname,
        "twitter"=>'https://twitter.com/'.$user->fullname,
        "instagram"=> 'https://instagram.com/'.$user->fullname
    ];

    $user->socialNetwork()->save(new SocialNetwork($face));
    $user->address()->save(new Address($addres[rand(0,2)]));

});



    factory(User::class, 5)->create([])->each(function ($user) use ($addres) {
     $user->roles()->attach(1);

     $face= [
        "linkedin"=>'https://linkedin.com/'.$user->fullname,
        "facebook"=>'https://facebook.com/'.$user->fullname,
        "twitter"=>'https://twitter.com/'.$user->fullname,
        "instagram"=> 'https://instagram.com/'.$user->fullname
    ];

    $user->socialNetwork()->save(new SocialNetwork($face));
    $user->address()->save(new Address($addres[rand(0,2)]));

});

    factory(User::class, 15)->create([])->each(function ($user) use ($addres) {
        $user->roles()->attach(2);

        $face= [
            "linkedin"=>'https://linkedin.com/'.$user->fullname,
            "facebook"=>'https://facebook.com/'.$user->fullname,
            "twitter"=>'https://twitter.com/'.$user->fullname,
            "instagram"=> 'https://instagram.com/'.$user->fullname
        ];

        $user->socialNetwork()->save(new SocialNetwork($face));
        $user->address()->save(new Address($addres[rand(0,2)]));

    });

    factory(User::class, 25)->create([])->each(function ($user) use ($addres) {
     $user->roles()->attach(3);

     $face= [
        "linkedin"=>'https://linkedin.com/'.$user->name,
        "facebook"=>'https://facebook.com/'.$user->name,
        "twitter"=>'https://twitter.com/'.$user->name,
        "instagram"=> 'https://instagram.com/'.$user->name
    ];

    $user->socialNetwork()->save(new SocialNetwork($face));
    $user->address()->save(new Address($addres[rand(0,2)]));

});

}
}
