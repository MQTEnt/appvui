<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GroupFormRequest extends Request
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
        $id = $this->id;
        return [
            'name' => 'required|unique:groups,name,'.$id,
            'fandom' => 'required|unique:groups,fandom,'.$id,
            'image' => 'required',
            'icon' => 'required'
        ];
    }
}
