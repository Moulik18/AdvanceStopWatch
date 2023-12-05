<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# Advanced Stopwatch

A feature-rich stopwatch application built with Laravel, Bootstrap, and Font Awesome.

## Table of Contents

- [Features](#features)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Features](#features)
- [Contributing](#contributing)
- [License](#license)

## Features

- Start, stop, and reset the stopwatch.
- Record lap times.
- Responsive design with Bootstrap.
- Stylish icons with Font Awesome.

## Getting Started

### Prerequisites

- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/)

### Installation

#### Create a New Laravel Project

1. **Install Laravel Installer globally:**

   ```bash
   composer global require laravel/installer

2. **Create a new Laravel project:**

   ```bash
   laravel new advanced-stopwatch

3. **Clone the repository:**

   ```bash
   git clone https://github.com/Moulik18/AdvanceStopWatch.git

4. **Create a new Laravel project:**

   ```bash
   composer create-project --prefer-dist laravel/laravel stopwatch-app

5. **Navigate to the project directory:**

   ```bash
   cd advanced-stopwatch

6. **Generate a controller:**

   ```bash
   php artisan make:controller StopwatchController

7. **routes/web.php**

   ```bash
   <?php
      use Illuminate\Support\Facades\Route;
      use App\Http\Controllers\StopwatchController;
      
      Route::get('/', [StopwatchController::class, 'index']);
      Route::post('/stopwatch/start', [StopwatchController::class, 'start']);
      Route::post('/stopwatch/stop', [StopwatchController::class, 'stop']);
   
7. **routes/web.php**

   ```bash
   <?php
      use Illuminate\Support\Facades\Route;
      use App\Http\Controllers\StopwatchController;
      
      Route::get('/', [StopwatchController::class, 'index']);
      Route::post('/stopwatch/start', [StopwatchController::class, 'start']);
      Route::post('/stopwatch/stop', [StopwatchController::class, 'stop']);

8. **app/Http/Controllers/StopwatchController.php**

   ```bash
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

5. **Create a new file : 'stopwatch.blade.php' LocationL resources/views/stopwatch.blade.php**


   



   

