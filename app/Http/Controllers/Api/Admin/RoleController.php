<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Admin\Role\RoleStore;

class RoleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->showArray(Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStore $request)
    {
        //
        $input=$request->inputs();
        $role=Role::create($input);
        return $this->showOne($role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        return $this->showOne($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleStore $request, Role $role)
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
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role=$role->delete();
        return $this->showOne($role);
    }
}
