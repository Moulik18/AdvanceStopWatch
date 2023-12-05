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
   
8. **routes/web.php**

   ```bash
   <?php
      use Illuminate\Support\Facades\Route;
      use App\Http\Controllers\StopwatchController;
      
      Route::get('/', [StopwatchController::class, 'index']);
      Route::post('/stopwatch/start', [StopwatchController::class, 'start']);
      Route::post('/stopwatch/stop', [StopwatchController::class, 'stop']);

9. **app/Http/Controllers/StopwatchController.php**

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

10. **Create a new file : 'stopwatch.blade.php' LocationL resources/views/stopwatch.blade.php**
    <a href="https://uploadnow.io/files/PYjtpxN">click here to download stopwatch.blade.php</a>

## Usage

- Visit [http://localhost:8000/stopwatch](http://localhost:8000/stopwatch) in your web browser.
- Click the "Start" button to start the stopwatch.
- Click the "Stop" button to stop the stopwatch and view the elapsed time.
- Click the "Lap" button to record lap times.
- Click the "Reset" button to reset the stopwatch and clear lap times.
- Explore additional advanced features.

## Contributing

Feel free to contribute to this project. If you find any issues or have suggestions for improvement, please open an issue or submit a pull request.

## Contributing
This project is licensed under the MIT License.
This update includes a section named "Create a New Laravel Project" with instructions on installing the Laravel Installer globally and using it to create a new Laravel project named `AdvanceStopWatch`. Adjust the commands as needed based on your preferences.
