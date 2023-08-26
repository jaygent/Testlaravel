<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Project;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request, Project $project): JsonResource
    {
        $data = $request->validated();
        $task=$project->tasks()->create($data);
        return TaskResource::make($task);
    }
}
