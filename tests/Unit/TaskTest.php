<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase; // Thio ensure the database is reset for each test

    /** @test */
    public function it_can_create_a_task()
    {
        $response = $this->postJson('/api/v1/tasks', [
            'title' => 'Test Task',
            'description' => 'This is a test description.',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'data' => [
                         'title' => 'Test Task',
                         'description' => 'This is a test description.',
                         'is_completed' => false, 
                     ]
                 ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'description' => 'This is a test description.',
        ]);
    }

    /** @test */
    public function it_can_mark_a_task_as_completed()
    {
        $task = Task::factory()->create([
            'title' => 'Incomplete Task',
            'is_completed' => false,
        ]);

        $response = $this->patchJson("/api/v1/tasks/{$task->id}/complete");

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => [
                         'id' => $task->id,
                         'is_completed' => true,
                     ]
                 ]);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'is_completed' => true,
        ]);
    }

    /** @test */
    public function it_can_list_tasks_with_pagination()
    {
        Task::factory()->count(15)->create();

        $response = $this->getJson('/api/v1/tasks');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         '*' => ['id', 'title', 'description', 'is_completed']
                     ],
                     'links',
                     'meta',
                 ])
                 ->assertJsonCount(10, 'data'); // Assuming pagination defaults to 10 items per page
    }

    /** @test */
    public function it_can_search_tasks()
    {
        Task::factory()->create(['title' => 'Unique Title']);
        Task::factory()->count(9)->create(); // Create additional tasks

        $response = $this->getJson('/api/v1/tasks?search=Unique');

        $response->assertStatus(200)
                 ->assertJsonCount(1, 'data')
                 ->assertJson([
                     'data' => [
                         ['title' => 'Unique Title']
                     ]
                 ]);
    }
}
