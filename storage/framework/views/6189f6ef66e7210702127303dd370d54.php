
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stopwatch App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            padding: 20px;
        }

        #elapsed-time {
    font-size: 36px; /* Adjust the font size as needed */
    margin-top: 4rem; /* Adjust the margin-top as needed */
    color: var(--mainColor); /* Use the main color from your existing CSS */
}

        #stopwatch-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ff0000;
            font-size: 2rem; /* Responsive font size */
        }

        button {
            margin: 5px;
            font-size: 16px;
        }

        #elapsed-time {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        #lap-list {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: left;
            color: #333;
        }

        #lap-list li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div id="stopwatch-container" class="mx-auto">
        <h1 class="mb-4">Stopwatch</h1>
        <p id="elapsed-time" class="mt-4">0:00:00.000</p>
        <button class="btn btn-success" onclick="startStopwatch()">
            <i class="fas fa-play"></i>
        </button>
        <button class="btn btn-danger" onclick="stopStopwatch()">
            <i class="fas fa-stop"></i>
        </button>
        <button class="btn btn-primary" onclick="lapStopwatch()">
            <i class="fas fa-flag"></i>
        </button>
        <button class="btn btn-secondary" onclick="resetStopwatch()">
            <i class="fas fa-redo"></i>
        </button>

        <ul id="lap-list"></ul>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<script>
    let startTime;
    let totalElapsedTime = 0;
    let isRunning = false;

    function startStopwatch() {
        if (!isRunning) {
            isRunning = true;
            startTime = new Date().getTime() - totalElapsedTime;
            updateElapsedTime();
        }
    }

    function stopStopwatch() {
        if (isRunning) {
            isRunning = false;
            totalElapsedTime = new Date().getTime() - startTime;
        }
    }

    function resetStopwatch() {
        isRunning = false;
        totalElapsedTime = 0;
        document.getElementById('elapsed-time').innerText = '0:00:00.000';
        document.getElementById('lap-list').innerHTML = ''; // Clear lap list
    }

    function lapStopwatch() {
        if (isRunning) {
            const lapTime = calculateLapTime();
            appendLapTime(lapTime);
        }
    }

    function calculateLapTime() {
        const currentTime = new Date().getTime();
        const elapsedTime = (currentTime - startTime) / 1000; // in seconds
        return formatTime(elapsedTime);
    }

    function appendLapTime(lapTime) {
        const lapList = document.getElementById('lap-list');
        const listItem = document.createElement('li');
        listItem.innerText = `Lap ${lapList.childElementCount + 1}: ${lapTime}`;
        lapList.appendChild(listItem);
    }

    function updateElapsedTime() {
        if (isRunning) {
            const currentTime = new Date().getTime();
            const elapsedTime = (currentTime - startTime + totalElapsedTime) / 1000; // in seconds
            const formattedTime = formatTime(elapsedTime);
            document.getElementById('elapsed-time').innerText = `${formattedTime}`;
            setTimeout(updateElapsedTime, 10); // Update every 10 milliseconds
        }
    }

    function formatTime(timeInSeconds) {
        const hours = Math.floor(timeInSeconds / 3600);
        const minutes = Math.floor((timeInSeconds % 3600) / 60);
        const seconds = Math.floor(timeInSeconds % 60);
        const milliseconds = Math.floor((timeInSeconds - Math.floor(timeInSeconds)) * 1000);
        return `${padZero(hours)}:${padZero(minutes)}:${padZero(seconds)}.${padZero(milliseconds, 3)}`;
    }

    function padZero(value, length = 2) {
        return value.toString().padStart(length, '0');
    }
</script>

</body>
</html>

<?php /**PATH D:\laravel\advanced-stopwatch\resources\views/stopwatch.blade.php ENDPATH**/ ?>