<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private $userService;

    public function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginSuccess(): void
    {
        self::assertTrue($this->userService->login("blue@test.com", "qwe"));
    }

    function testLoginUserNotFound(): void
    {
        self::assertFalse($this->userService->login("black@test.com", "qwe"));
    }

    function testLoginWrongPassword(): void
    {
        self::assertFalse($this->userService->login("blue@test.com", "wrong"));
    }
}
