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
                // 'title' => 'required|min:3|unique:post,title,'.$this->user()->id,
                'title' => 'required|min:3',
                'img' => 'image|mimes:png,jpg,jpeg|max:2048',
                'describtion' => 'required|min:10',
                'user_id' => 'required|exists:users,id',
        ];
    }
    public function messages()
{
    return [
        'title.min'=>'TITLE SHOULD BE MORE THAN  3  CHAR',
        'title.required'=>'TITLE IS REQUIRED (NOT EMPTY)',
        'title.unique'=>'TITLE SHOULD BE UNIQUE',
        'user_id.exists'=>'USER_ID NOT EXSIST',
        'describtion.required'=>'CONTENT IS REQUIRED (NOT EMPTY)',
        'describtion.min'=>'CONTENT SHOULD BE MORE THAN  10  CHAR',

    ];
}

}
