<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use App\Http\Traits\ConnectionTrait;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;

class LogsController extends Controller
{

    use ConnectionTrait;

    public function index(Request $request, $cloud)
    {
        if ($cloud == "a" && !session('databaseA')) {
            flash()->error("You are not connected to remote database at Cloud A!");
            return redirect()->route('home');
        }

        if ($cloud == "b" && !session('databaseB')) {
            flash()->error("You are not connected to remote database at Cloud B!");
            return redirect()->route('home');
        }

        /* $logs = Log::noDebug()->orderBy('id', 'DESC')->limit(50)->get();
         return view('logs', compact('logs'));*/
        return view('logs')->with('cloud', $cloud);
    }

    public function messages(Request $request)
    {
        if (!session('databaseA')) {
            flash()->error("You are not connected to the remote database!");
            return redirect()->route('home');
        }

        $this->connectA();

        $logs = Log::message()->orderBy('id', 'DESC')->limit(10)->get();

        foreach ($logs as $log) {

            list($direction, $message) = explode('.', $log->message);
            $log->direction = $direction;
            $log->message = $message;
        }

        return view('messages', compact('logs'));
    }

    public function getLogData(Request $request, $cloud)
    {

        if ($cloud == "b") {
            $this->connectB();
        }
        else {
            $this->connectA();
        }

        $logs = Log::noDebug()->orderBy('id', 'ASC')->get();

        return Datatables::of($logs)->make(true);
    }

}
