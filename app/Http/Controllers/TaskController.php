<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Service\TaskService;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request,int $id,TaskService $taskService): JsonResource
    {
        return $taskService->store($id,$request);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
