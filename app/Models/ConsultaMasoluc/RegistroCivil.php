<?php

namespace App\Models\ConsultaMasoluc;

use Illuminate\Database\Eloquent\Model;

class RegistroCivil extends Model
{
    //
	protected $connection ="sqlsrv_masoluc";
	//protected $connection ="sqlsrv";
	protected $table="registro_civil";
	public $timestamps = false;
	protected $fillable=[
		"Nombre"
		,"Sexo"
		,"COD_CONDICION_CEDULADO"
		,"FechaNacimiento2"
		,"LugarNacimiento"
		,"Nacionalidad"
		,"EstadoCivil"
		,"NombreConyuge"
		,"NombrePadre"
		,"NacionalidadPadre"
		,"NombreMadre"
		,"NacionalidadMadre"
		,"Domicilio"
		,"Calle"
		,"NumeroCalle"
		,"FechaMatrimonio"
		,"LugarMatrimonio"
		,"FECHA_INSC_DEFUNCION"
		,"COD_LUGAR_INSC_DEFUNCION"
		,"FechaDefuncion"
		,"LugarDefuncion"
		,"Instruccion"
		,"Profesion"
		,"FECHA_EXPEDICION_CED"
		,"FECHA_ACTUALIZACION_CED"
		,"CEDULA_MAGNA"
		,"CEDULA_CONYUGE"
		,"CEDULA_PADRE"
		,"CEDULA_MADRE"
		,"CEDULA2"
		,"FechaNacimiento"
		,"DES_SEXO"
		,"DES_CIUDADANIA"
		,"DES_NACIONALID"
		,"DES_ESTADO_CIVIL"
		,"DESC_NIV_EST"
		,"DES_PROFESION"
	];
}
