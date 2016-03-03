<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProductRequest extends Request
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
            
            'name'=>'required|unique:products,name,'.$this->route('products'),
            'description'=>'requried',
            'price'=>'required',
            'type'=>'required'
            
        ];
    }
    
    public function messages()
    {
        return [
            'name.required'=>'Fill this out',
            'description.required'=>'Fill this out',
            'price.required'=>'Fill this out',
            'type.required'=>'Fill this out'
            
        ];
    }
}
