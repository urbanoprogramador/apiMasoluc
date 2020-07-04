<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class PermissionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->showArray(Permission::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Permissionstore $request)
    {
        //
        $data=$request->$inputs();
        
        return  $this->showOne(Permission::create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
        return $this->showOne($permission);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdate $request, Permission $permission)
    {
        //
        $input=$request->inputs($product);
        //dd($input);
        $role->fill($input);
        if($role->isClean()){
            return $this->errorResponse('Debe Especificar al menos un valor diferente para actualizar',422);
        }
        $role->save();
        return $this->showOne($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
        $permission->delete();
        return $this->showOne($permission);
    }
}
