<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardLoginController extends Controller
{
    public function Login()
    {
        return view('Login');
    }

    public function SignUp()
    {
        return view('SignUp');
    }

    public function Dashboard()
    {
        return view('Dashboard');
    }

    public function Services()
    {
        return view('Services');
    }
}
