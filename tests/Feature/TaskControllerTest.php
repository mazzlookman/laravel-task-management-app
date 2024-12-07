<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    function testTaskPage(): void
    {
        $this->withSession([
            "email" => "blue@test.com",
            "tasks" => [
                [
                    "id" => "1",
                    "task" => "Learn PHP"
                ], [
                    "id" => "2",
                    "task" => "Learn Go"
                ]
            ]
        ])
            ->get("/tasks")
            ->assertSeeText("1")
            ->assertSeeText("Learn PHP")
            ->assertSeeText("2")
            ->assertSeeText("Learn Go");
    }

    function testAddTaskSuccess(): void
    {
        $this->withSession(["email" => "blue@test.com"])
            ->post("/tasks", ["id" => uniqid(), "task" => "Task 1 Added"])
            ->assertRedirect("/tasks");
    }

    function testAddTaskFailed(): void
    {
        $this->withSession(["email" => "blue@test.com"])
            ->post("/tasks", [])
            ->assertSeeText("Task is required");
    }

    public function testRemoveTask()
    {
        $this->withSession([
            "email" => "blue@test.com",
            "tasks" => [
                [
                    "id" => "1",
                    "task" => "Learn PHP"
                ], [
                    "id" => "2",
                    "task" => "Learn Go"
                ]
            ]
        ])->post("/tasks/1/delete")
            ->assertRedirect("/tasks");
    }
}
