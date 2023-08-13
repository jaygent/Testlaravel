<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProjectSearch
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request=$request;
    }

    public function get(int $id): Collection
    {
        $search=$this->request->query('search');
        $project=User::findOrFail($id)->projects()->when($search,function (Builder $query, string $search) {
            $query->where('name','LIKE',"%$search%");
        });
        return $project->get();
    }
}