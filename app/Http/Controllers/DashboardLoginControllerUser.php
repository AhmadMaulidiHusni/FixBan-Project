<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardLoginControllerUser extends Controller
{
    public function Login()
    {
        return view('Login');
    }

    public function SignUp()
    {
        return view('SignUp');
    }


    public function DashboardUser()
    {
        return view('User.DashboardUser');
    }


    public function ServicesUser()
    {   
        $services = \App\Models\Service::all(); 
        return view('User.ServicesUser', compact('services')); 
    }

    public function MapsUser()
    {
        return view('User.MapsUser');
    }
}
