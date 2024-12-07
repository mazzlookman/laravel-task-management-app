<?php

namespace App\Providers;

use App\Services\Impl\TaskServiceImpl;
use App\Services\TaskService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        TaskService::class => TaskServiceImpl::class
    ];

    public function provides(): array
    {
        return [TaskService::class];
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
