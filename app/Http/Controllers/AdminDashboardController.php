<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\EnsureUserIsAdmin::class);
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
