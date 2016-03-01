<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use App\Http\Traits\ConnectionTrait;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

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


        if (!(session('databaseA') || session('databaseB'))) {
            flash()->error("You are not connected to the remote database!");
            return redirect()->route('home');
        }

        $this->connectA();

        $logsA = Log::message()->orderBy('id', 'DESC')->limit(30)->get();

        foreach ($logsA as $log) {

            list($direction, $message) = explode('.', $log->message);
            $log->direction = $direction;
            $log->message = $message;
            $log->cloud = "A";
        }

        $this->connectB();

        //Log::resolveConnection()->reconnect();

        $logsB = Log::message()->orderBy('id', 'DESC')->limit(30)->get();

        foreach ($logsB as $log) {

            list($direction, $message) = explode('.', $log->message);
            $log->direction = $direction;
            $log->message = $message;
            $log->cloud = "B";
        }

        //dd($logsB);

        return view('messages', compact('logsA', 'logsB'));
    }

    public function getLogData(Request $request, $cloud)
    {

        if ($cloud == "b") {
            $this->connectB();
        } else {
            $this->connectA();
        }

        $logs = Log::noDebug()->orderBy('id', 'ASC')->get();

        return Datatables::of($logs)->make(true);
    }

}
