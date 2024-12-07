<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    function testLoginPage(): void
    {
        $this->get("login")->assertSeeText("Login Page");
    }

    function testLoginSuccess(): void
    {
        $this->post("/login", [
            "email" => "blue@test.com",
            "password" => "qwe"
        ])
            ->assertStatus(302)
            ->assertSessionHas("email")
            ->assertRedirect("/");
    }

    function testLoginValidationError(): void
    {
        $this->post("/login", [])
            ->assertSeeText("Email or password cannot be empty");
    }

    function testLoginFailed(): void
    {
        $this->post("/login", [
            "email" => "blue@test.com",
            "password" => "wrong"
        ])
            ->assertSeeText("Incorrect email or password");
    }

    function testLogout(): void
    {
        $this->withSession([
            "email" => "blue@test.com",
        ])
            ->post("/logout")
            ->assertStatus(302)
            ->assertSessionMissing("email");
    }
}
