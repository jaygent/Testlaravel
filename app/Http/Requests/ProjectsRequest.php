<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id'=>['required','exists:App\Models\User,id'],
            'name'=>'required|max:200',
            'description'=>'nullable'
        ];
    }
}
