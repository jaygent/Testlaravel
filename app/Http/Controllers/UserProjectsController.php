<?php

namespace App\Http\Controllers;

use App\Helpers\ProjectSearch;
use App\Http\Resources\ProjectCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProjectsController extends Controller
{
    public function show(int $id, ProjectSearch $projectSearch): JsonResource
    {
        return new ProjectCollection($projectSearch->get($id));
    }
}
