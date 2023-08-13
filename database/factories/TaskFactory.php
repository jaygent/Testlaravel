<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'user_id' => User::all()->random(),
            'project_id' => Project::all()->random(),
           // 'status'=>StatusTask::Canceled,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
