<?php

namespace App\Http\Requests;

use App\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       // dd($project);

       return true; //Auth::user()->can('update', $this->project);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd(request());

        return [
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date'
        ];
    }
}
