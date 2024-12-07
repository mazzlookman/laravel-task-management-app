<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    function index(): Response
    {
        $tasks = $this->taskService->getAll();
        return response()->view("tasks.index", [
            "title" => "Task Management",
            "tasks" => array_reverse($tasks)
        ]);
    }

    function add(Request $request): Response | RedirectResponse
    {
        $task = $request->input("task");
        if (empty($task)){
            $tasks = $this->taskService->getAll();
            return response()->view("tasks.index", [
                "title" => "Task Management",
                "tasks" => $tasks,
                "error" => "Task is required"
            ]);
        }

        $this->taskService->store(uniqid(), $task);
        return redirect()->action([TaskController::class, "index"]);
    }

    function destroy(string $id): Response | RedirectResponse
    {
        $this->taskService->remove($id);
        return redirect()->action([TaskController::class, "index"]);
    }
}
