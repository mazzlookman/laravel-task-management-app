<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    function homePage(Request $request): RedirectResponse
    {
        if ($request->session()->exists("email")) {
            return redirect("/tasks");
        } else {
            return redirect("/login");
        }
    }
}
