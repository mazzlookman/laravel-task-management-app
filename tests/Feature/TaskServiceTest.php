<?php

namespace Tests\Feature;

use App\Services\TaskService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
}
