<?php

use Illuminate\Database\Seeder;
use App\Models\ConsultaMasoluc\RegistroCivil;

class RegistroCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            factory(RegistroCivil::class, 2500)->create();
    }
}
