<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 projects, each with 5 tasks
        Project::factory(5)->create()->each(function ($project) {
            Task::factory(2)->create(['project_id' => $project->id]);
        });
    }
}

