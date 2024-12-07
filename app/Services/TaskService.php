<?php

namespace App\Services;

interface TaskService
{
    function store(string $id, string $task): void;
    function getAll(): array;
    function remove(string $id): void;
}
