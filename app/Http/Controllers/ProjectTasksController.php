<?php

namespace App\Http\Controllers;

use App\Helpers\FilterTaskUsers;
use App\Http\Resources\TaskCollection;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectTasksController extends Controller
{
    public function show(int $id, FilterTaskUsers $filterTaskUsers): JsonResource
    {
        return new TaskCollection($filterTaskUsers->get($id));
    }

    public function destroy(Project $project, Task $task_id): JsonResponse
    {
        return response()->json(['success'=>$task_id->delete()]);
    }
}
