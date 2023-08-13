<?php

namespace App\Http\Controllers;

use App\Helpers\FilterTaskUsers;
use App\Http\Resources\TaskCollection;
use App\Service\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectTasksController extends Controller
{
    public function show(int $id, FilterTaskUsers $filterTaskUsers): JsonResource
    {
        return new TaskCollection($filterTaskUsers->get($id));
    }

    public function destroy(int $id, int $task_id, TaskService $service): JsonResponse
    {
        return $service->destroy($id, $task_id);
    }
}
