<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\User;

class UpdateUserRequest extends FormRequest
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
        $id = $this->route('id');
        $user = User::find($id);

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,id',
            'gender' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'avatar' => 'required|image|mimes:jpg,jpeg',
        ];
    }
}
