<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
        //dd(request()->all());    

        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date',
        ];
    }
}
