<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
                'title' => 'required|min:3',
                'describtion' => 'required|min:10',
                'user_id' => 'required',
        ];
    }
    public function messages()
{
    return [
        'title.min'=>'TITLE SHOULD BE MORE THAN  3  CHAR',
        'title.required'=>'TITLE IS REQUIRED (NOT EMPTY)',
        'title.unique'=>'TITLE SHOULD BE UNIQUE',
        'describtion.required'=>'CONTENT IS REQUIRED (NOT EMPTY)',
        'describtion.min'=>'CONTENT SHOULD BE MORE THAN  10  CHAR',

    ];
}

}
