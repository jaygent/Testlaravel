<?php

namespace App\Http\Requests;

use App\Enums\StatusTask;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
