<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    function testIsMember(): void
    {
        $this->withSession([
            "email" => "blue@test.com"
        ])
            ->get("/")
            ->assertRedirect("/todolist");
    }

    function testIsGuest(): void
    {
        $this->get("/")
            ->assertRedirect("/login");
    }
}
