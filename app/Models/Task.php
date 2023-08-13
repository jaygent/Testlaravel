<?php

namespace App\Models;

use App\Enums\StatusTask;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'user_id',
        'project_id',
        'status',

    ];

    protected $casts=[
      'status'=>StatusTask::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
