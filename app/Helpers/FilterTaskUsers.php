<?php

namespace App\Helpers;

use App\Models\Project;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class FilterTaskUsers
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request=$request;
    }

    public function get(int $id): Collection
    {
        $userId=$this->request->query('user_id');
        $taskList=Project::findOrFail($id)->tasks()->when($userId, function (Builder $query, string $userid) {
            $query->where('user_id', $userid);
        });
        return $taskList->get();
    }
}
