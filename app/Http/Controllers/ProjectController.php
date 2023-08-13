<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectsRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Service\ProjectService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectController extends Controller
{
    public function show(int $id,ProjectService $service): JsonResource
    {
        return new ProjectResource($service->show($id));
    }

    public function store(ProjectsRequest $request,ProjectService $service): JsonResource
    {
        return new ProjectResource($service->store($request->validated()));
    }

    public function update(ProjectsRequest $request, int $id, ProjectService $service): JsonResource
    {
       return new ProjectResource($service->update($request->validated(),$id));
    }

    public function destroy(int $id, ProjectService $service): JsonResponse
    {
        return $service->destroy($id);
    }

}
