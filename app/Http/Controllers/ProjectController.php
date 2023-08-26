<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectsRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectController extends Controller
{
    public function show(Project $id): JsonResource
    {
        return new ProjectResource($id);
    }

    public function store(ProjectsRequest $request): JsonResource
    {
        return new ProjectResource(Project::create($request->validated()));
    }

    public function update(ProjectsRequest $request, Project $project): JsonResource
    {
        $project->update($request->validated());
        return new ProjectResource($project->fresh());
    }

    public function destroy(Project $project): JsonResponse
    {
        return request()->json(['success' => $project->delete()]);
    }

}
