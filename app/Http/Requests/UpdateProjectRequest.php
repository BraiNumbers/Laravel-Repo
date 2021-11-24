<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //auth user can | policy
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
     
        return [
            'name' => 'required|min:3|max:255',
            'intro' => 'required',
            'description' => 'required',
            'project_image' => 'image',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date'
        ];
    }
}
