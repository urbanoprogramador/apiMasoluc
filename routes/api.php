<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('login','Api\AuhtController@authenticate');
Route::group(['middleware' => ['auth:api']], function () {

	//Route::get('users','Api\UserController@index');
	//Route::apiResource('roles','Api\Admin\RoleController');
	//Route::apiResource('permissons','Api\PermissionController');
	Route::get('perfil','Api\AuhtController@perfil');
});



Route::get('sp/registro_civil',function(Request $request){
	$persona=DB::connection('sqlsrv_masoluc')->select("EXEC  [sp_ConsDatosPersona] ? ,NULL, NULL ,NUll	",array($request->cedula));
	$familia=DB::connection('sqlsrv_masoluc')->select("EXEC  [sp_ConsDatosFamiliar] ? , 'Error',NULL,NULL,NULL,NULL	",array($request->cedula));
	return response()->json([
		"persona"=>$persona,
		"familia"=>$familia
	]);
});

Route::get('sp/registro_civil/nombre',function(Request $request){
	$data=DB::connection('sqlsrv_masoluc')->select("EXEC  [usp_consulta_datos] 1 ,?	",array($request->nombre));
	return response()->json($data);
});

Route::get('sp/datos_familiar',function(Request $request){
	$data=DB::connection('sqlsrv_masoluc')->select("EXEC  [sp_ConsDatosFamiliar] ? , 'Error',NULL,NULL,NULL,NULL	",array($request->cedula));
	return response()->json($data);
});

/*
[sp_ConsDatosFamiliar]
EXEC	@return_value = [dbo].[usp_consulta_datos]
		@fld_tipo = 5,
		@parametro = N'5437057'*/

Route::apiResource('users','Api\UserController');
Route::apiResource('roles','Api\Admin\RoleController');
Route::apiResource('permissions','Api\Admin\PermissionController');

/*Route::apiResource('/demos','Demos\UserDemoController'); permissions*/