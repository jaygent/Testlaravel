<?php

namespace App\Service;


use App\Models\Project;
use Illuminate\Http\JsonResponse;
use LogicException;

class ProjectService
{
    public function show($id): Project
    {
        return Project::findOrFail($id);
    }

    public function store(mixed $data): Project
    {
       return Project::create($data);
    }

    public function update(mixed $data, int $id): Project
    {
        $project=Project::findOrFail($id);
        $project::update($data);
        return $project->fresh();
    }

    public function destroy(int $id): JsonResponse
    {
        $project=Project::findOrFail($id)->delete();
        if ($project===0) {
            return response()->json(['error' => 'Project not found'], 404);
        }
        return response()->json(['success'=> true],204);
    }

}