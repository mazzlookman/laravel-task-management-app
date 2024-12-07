<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    function login(): Response
    {
        return response()
            ->view("users.login", [
                "title" => "Login Page"
            ]);
    }

    function doLogin(Request $request): Response | RedirectResponse
    {
        // get request body
        $email = $request->input("email");
        $password = $request->input("password");

        // validate request body
        if (empty($email) || empty($password)) {
            return response()->view("users.login", [
                "title" => "Login Page",
                "error" => "Email or password cannot be empty"
            ]);
        }

        // login success
        if ($this->userService->login($email, $password)) {
            $request->session()->put("email", $email);
            return redirect("/");
        }

        // login fail
        return response()->view("users.login", [
            "title" => "Login Page",
            "error" => "Incorrect email or password"
        ]);
    }

    function doLogout(Request $request): Response | RedirectResponse
    {
        $request->session()->forget("email");
        return redirect("/");
    }
}
