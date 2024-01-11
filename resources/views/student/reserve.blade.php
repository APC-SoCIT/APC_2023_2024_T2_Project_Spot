<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- styles -->
    <link href = "/css/custom.css" rel="stylesheet">
</head>
<body>
        <!-- Sidebar Navigation-->
        @include('student.sidebar')
        <!-- Sidebar Navigation end-->

        <!-- Body-->
        <div id="content">
    <div class="logout-container">
        <x-app-layout>
            <div class="page-content">
                <h1 class = "mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                    Reserve a Venue</h1>

                    <form action="#" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="venue">Venue:</label>
        <select id="venue" name="venue" required>
            <option value="">Select Venue</option>
            <option value="auditorium">Auditorium</option>
            <option value="classroom">Classroom (A)</option>
            <option value="classroom">Classroom (B)</option>
            <option value="lab">Computer Lab</option>
            <option value="other">Other (Please Specify)</option>
        </select>

        
<br>

        
<label
 
for="date">Date:</label>

        
<input
 
type="date"
 
id="date"
 
name="date"
 
required>

        
<br>

        
<label
 
for="time">Time:</label>

        
<input
 
type="time"
 
id="time"
 
name="time"
 
required>

        
<br>

        
<label
 
for="purpose">Purpose:</label>
        <select id="purpose" name="purpose" required>
            <option value="">Select Purpose</option>
            <option value="academic">Academic Event</option>
            <option value="event">For Event</option>
            <option value="other">Other (Please Specify)</option>
        </select>
        <br>
        <label for="activity">Nature of Activity:</label>
    <input type="radio" id="academic" name="activity" value="academic"> Academic
    <br>
    <input type="radio" id="event" name="activity" value="event"> Event Related
    <br>
    <input type="radio" id="other" name="activity" value="other"> Other (Please Specify)
<br>
        <label for="description">Description (Optional):</label>
        <br>
        <textarea id="description" name="description" rows="5"></textarea>
        <br>
        <button type="submit">Submit Reservation</button>
    </form>
                
            </div>
        </x-app-layout>  
    </div>
</div>
        <!-- Body end-->
</body>
</html>