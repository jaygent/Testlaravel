<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['nullable'],
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'status' => ['sometimes','[new Enum(StatusTask::class)]'],
        ];
    }
}
