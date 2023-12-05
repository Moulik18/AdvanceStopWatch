<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class StopwatchController extends Controller
{
    private $startTime;
    private $laps = [];

    public function index()
    {
        return view('stopwatch');
    }

    public function start()
    {
        $this->startTime = now(); // Save the current time as the start time
        $this->laps = []; // Clear laps array when starting a new stopwatch
        return response()->json(['status' => 'success']);
    }

    public function stop()
    {
        $elapsedTime = now()->diffInSeconds($this->startTime); // Calculate elapsed time
        return response()->json(['status' => 'success', 'elapsed_time' => $elapsedTime, 'laps' => $this->laps]);
    }

    public function lap()
    {
        $lapTime = now()->diffInSeconds($this->startTime); // Calculate lap time
        $this->laps[] = $lapTime; // Save lap time to the laps array
        return response()->json(['status' => 'success', 'lap_time' => $lapTime]);
    }
}
