<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class HomeController extends Controller
{
    public function commands()
    {
        return view('commands');
        /*flash()->error("This feature has not been implemented yet!");
        return redirect()->route('home');*/
    }

    public function utilities()
    {
        return view('utilities');
    }

    public function info()
    {
        return view('page.info');
    }

    public function help()
    {
        return view('page.help');
    }

    public function welcome()
    {
        return view('page.welcome');
    }

}
