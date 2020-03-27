<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
          
                'title' => 'required|min:5',
                'describtion' => 'required|min:6',
                'user_id' => 'required',
            

        ];
    }
    public function messages()
{
    return [
        'title.min'=>'title more than 3  char',
        'title.required'=>'title not be empty',
        'describtion.required'=>'describtion not be empty',
        'describtion.min'=>'describtion more than 6  char',

    ];
}

}
