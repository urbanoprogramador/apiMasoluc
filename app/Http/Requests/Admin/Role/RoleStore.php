<?php

namespace App\Http\Requests\Admin\Role;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class RoleStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'requiet'
        ];
    }

    public function inputs(){

        $data=$this->only((new Role())->inputs() );
        return $data;
    }
}
