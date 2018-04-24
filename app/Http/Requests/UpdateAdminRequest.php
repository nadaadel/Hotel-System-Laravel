<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class UpdateAdminRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
           
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$request->id,
            'national_id'=>'required|unique:admins,national_id,'.$request->id,
            'password'=>'required|string|min:6',
            'photo'=>'image|mimes:jpg,png',
        
        ];
    }
}
