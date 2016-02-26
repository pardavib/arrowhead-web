<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ConnectionTrait;
use DB;

class ConnectionsController extends Controller
{
    use ConnectionTrait;

    public function show(Request $request)
    {
        return view('connect');
    }

    public function set(Request $request)
    {

        if ($request->get("database")) {
            $request->session()->put('addressA', $request->get("address"));
            $request->session()->put('databaseA', $request->get("database"));
            $request->session()->put('usernameA', $request->get("username"));
            $request->session()->put('passwordA', $request->get("password"));

            $this->connectA();

            // Throws error if problem occurs
            DB::select("select 1 from dual");
            flash()->info("Cloud A: Successfully connected to the database: " . DB::connection()->getDatabaseName());
            return redirect()->route('connect');
        }

        if ($request->get("database2")) {
            $request->session()->put('addressB', $request->get("address2"));
            $request->session()->put('databaseB', $request->get("database2"));
            $request->session()->put('usernameB', $request->get("username2"));
            $request->session()->put('passwordB', $request->get("password2"));

            $this->connectB();

            // Throws error if problem occurs
            DB::select("select 1 from dual");
            flash()->info("Cloud B: Successfully connected to the database: " . DB::connection()->getDatabaseName());
            return redirect()->route('connect');
        }

        return redirect()->route('home');
    }

    public function disconnect()
    {
        \Session::flush();

        flash()->info("Disconnected from database(s)");

        //return redirect()->action('ConnectionsController@connect');
        return redirect()->route('home');
    }

}
