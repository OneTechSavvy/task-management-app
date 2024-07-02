<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function tasks_are_listed_correctly()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    /** @test */
    public function a_task_can_be_created()
    {
        $project = Project::factory()->create();
        $response = $this->post('/tasks', [
            'name' => 'New Task',
            'priority' => 1,
            'project_id' => $project->id,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', ['name' => 'New Task']);
    }

    /** @test */
    public function a_task_can_be_updated()
    {
        $task = Task::factory()->create();
        $response = $this->put("/tasks/{$task->id}", [
            'name' => 'Updated Task',
            'priority' => 2,
            'project_id' => $task->project_id,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', ['name' => 'Updated Task']);
    }

    /** @test */
    public function a_task_can_be_deleted()
    {
        $task = Task::factory()->create();
        $response = $this->delete("/tasks/{$task->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    /** @test */
    public function tasks_can_be_reordered()
    {
        $tasks = Task::factory()->count(3)->create();
        $response = $this->post('/tasks/reorder', [
            'tasks' => $tasks->pluck('id')->toArray(),
        ]);

        $response->assertStatus(200);
    }
}
