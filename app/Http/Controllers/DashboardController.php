<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'fname' => 'Hello',
            'lname' => 'World'
        ];

        return Inertia::render('Dashboard/Index', $data);
    }
}
