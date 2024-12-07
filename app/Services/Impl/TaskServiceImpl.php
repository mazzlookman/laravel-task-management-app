<?php

namespace App\Services\Impl;

use App\Services\TaskService;
use Illuminate\Support\Facades\Session;

class TaskServiceImpl implements TaskService
{
    public function store(string $id, string $task): void
    {
        if (!Session::exists("tasks")) {
            Session::put("tasks", []);
        }

        Session::push("tasks", [
            "id" => $id,
            "task" => $task
        ]);
    }

    public function getAll(): array
    {
        return Session::get("tasks", []);
    }

    function remove(string $id): void
    {
        $tasks = Session::get("tasks");
        foreach ($tasks as $index => $task) {
            if ($task['id'] === $id) {
                unset($tasks[$index]);
            }
        }

        Session::put("tasks", $tasks);
    }
}
