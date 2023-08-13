<?php

namespace App\Service;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskService
{

    public function store(int $id, StoreTaskRequest $request): JsonResource
    {
        Project::findOrFail($id);
        $data = $request->validated();
        $data['project_id'] = $id;
        return new TaskResource(Project::create($data));
    }

    public function destroy(int $id, int $task_id): JsonResponse
    {
        $project=Project::findOrFail($id)->tasks()->where('id',$task_id)->delete();
        if ($project===0) {
            return response()->json([ 'error' => 'Not found task or project'], 404);
        }
        return response()->json(['success'=> true],204);
    }
}
