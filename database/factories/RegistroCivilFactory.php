<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ConsultaMasoluc\RegistroCivil;
use Faker\Generator as Faker;

$factory->define(RegistroCivil::class, function (Faker $faker) {
	$sexo=[1,2];
	$estadoCivil=[
		0,1,2,3,4,5
	];
	$desnaci=[
		'ecuatoriano',
		'argentino',
		'venezolano',
		'colombiano'
	];


	return [
		"Cedula"=>$faker->numberBetween(1000000,  9000000)
		,"Nombre"=>$faker->name
		,"Sexo"=>$faker->randomElements($sexo)[0]
		,"COD_CONDICION_CEDULADO"=>'noce'
		,"FechaNacimiento2"=>$faker->date('Y-m-d', 'now')
		,"LugarNacimiento"=>$faker->cityPrefix
		,"Nacionalidad"=>$faker->country
		,"EstadoCivil"=>$faker->randomElements($estadoCivil)[0]
		,"NombreConyuge"=>$faker->name
		,"NombrePadre"=>$faker->name('male')
		,"NacionalidadPadre"=>$faker->country
		,"NombreMadre"=>$faker->name('female')
		,"NacionalidadMadre"=>$faker->country
		,"Domicilio"=>$faker->address                             
		,"Calle"=>$faker->streetAddress                       
		,"NumeroCalle"=>$faker->streetName
		,"FechaMatrimonio"=>$faker->date('Y-m-d', 'now')
		,"LugarMatrimonio"=>$faker->country
		,"FECHA_INSC_DEFUNCION"=>null
		,"COD_LUGAR_INSC_DEFUNCION"=>null
		,"FechaDefuncion"=>null
		,"LugarDefuncion"=>null
		,"Instruccion"=>$faker->jobTitle
		,"Profesion"=>$faker->jobTitle
		,"FECHA_EXPEDICION_CED"=>$faker->date('Y-m-d', 'now')
		,"FECHA_ACTUALIZACION_CED"=>$faker->date('Y-m-d', 'now')
		,"CEDULA_MAGNA"=>$faker->numberBetween(1000000,  9000000)
		,"CEDULA_CONYUGE"=>$faker->numberBetween(1000000,  9000000)
		,"CEDULA_PADRE"=>$faker->numberBetween(1000000,  9000000)
		,"CEDULA_MADRE"=>$faker->numberBetween(1000000,  9000000)
		,"CEDULA2"=>$faker->numberBetween(1000000,  9000000)
		,"FechaNacimiento"=>$faker->date('Y-m-d H:i', 'now')
		,"DES_SEXO"=>$faker->randomElements($sexo)[0]
		,"DES_CIUDADANIA"=>$faker->randomElements($desnaci)[0]
		,"DES_NACIONALID"=>$faker->randomElements($desnaci)[0]
		,"DES_ESTADO_CIVIL"=>$faker->randomElements($estadoCivil)[0]
		,"DESC_NIV_EST"=>$faker->jobTitle
		,"DES_PROFESION"=>$faker->jobTitle
	];
});
