<?php

namespace Tests\Feature;

use App\Services\TaskService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class TaskServiceTest extends TestCase
{
    private TaskService $taskService;
    function setUp(): void
    {
        parent::setUp();

        $this->taskService = $this->app->make(TaskService::class);
    }

    function testTaskServiceProvider(): void
    {
        self::assertNotNull($this->taskService);
    }

    function testStoreTask(): void
    {
        $this->taskService->store("123", "Breakfast");
        $tasks = Session::get("tasks");
        foreach ($tasks as $task) {
            self::assertEquals("123", $task['id']);
            assertEquals("Breakfast", $task['task']);
        }
    }

    function testGetTasksEmpty(): void
    {
        self::assertEquals([], $this->taskService->getAll());
    }

    function testGetTasks(): void
    {
        $expected = [
            [
                "id" => "1",
                "task" => "Learn PHP"
            ], [
                "id" => "2",
                "task" => "Learn Go"
            ]
        ];

        $this->taskService->store("1", "Learn PHP");
        $this->taskService->store("2", "Learn Go");

        self::assertEquals($expected, $this->taskService->getAll());
    }

    function testRemoveTask()
    {
        $this->taskService->store("1", "Learn PHP");
        $this->taskService->store("2", "Learn Go");
        self::assertEquals(2, sizeof($this->taskService->getAll()));

        $this->taskService->remove("3");
        self::assertEquals(2, sizeof($this->taskService->getAll()));

        $this->taskService->remove("1");
        self::assertEquals(1, sizeof($this->taskService->getAll()));

        $this->taskService->remove("2");
        self::assertEquals(0, sizeof($this->taskService->getAll()));
    }
}
