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
                    Edit Reservation Details</h1>

                    <form action="{{ url('update-reservation', $reservation->id) }}" method="POST" enctype="multipart/form-data">
                    
    @csrf
    <!-- Add other form fields here if needed -->

    <label for="venue">Venue:</label>
    <select id="venue" name="venue" required>
        <option value="auditorium" {{ $reservation->venue == 'auditorium' ? 'selected' : '' }}>Auditorium</option>
        <option value="classroom_a" {{ $reservation->venue == 'classroom_a' ? 'selected' : '' }}>Classroom (A)</option>
        <option value="classroom_b" {{ $reservation->venue == 'classroom_b' ? 'selected' : '' }}>Classroom (B)</option>
        <option value="lab" {{ $reservation->venue == 'lab' ? 'selected' : '' }}>Computer Lab</option>
        <option value="other" {{ $reservation->venue == 'other' ? 'selected' : '' }}>Other (Please Specify)</option>
    </select>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" value="{{ $reservation->date }}" required>

    <label for="time">Time:</label>
    <input type="time" id="time" name="time" value="{{ $reservation->time }}" required>

    <label for="purpose">Purpose:</label>
    <select id="purpose" name="purpose" required onchange="showAdditionalDropdown()">
        <option value="Meetings" {{ $reservation->purpose == 'Meetings' ? 'selected' : '' }}>Meetings and Conferences</option>
        <option value="Examinations" {{ $reservation->purpose == 'Examinations' ? 'selected' : '' }}>Examinations</option>
        <option value="Events" {{ $reservation->purpose == 'Events' ? 'selected' : '' }}>School Organization</option>
    </select>

    <div id="additionalDropdown" style="display: none;">
        <label for="activity">Nature of Activity:</label>
        <select id="activity" name="activity">
            <!-- Add the selected attribute based on the value from the $reservation variable -->
            <option value="Workshop/Technical Training" {{ $reservation->activity == 'Workshop/Technical Training' ? 'selected' : '' }}>Workshop/Technical Training</option>
            <option value="Seminar/Webinar/Symposium/Forum" {{ $reservation->activity == 'Seminar/Webinar/Symposium/Forum' ? 'selected' : '' }}>Seminar/Webinar/Symposium/Forum</option>
            <option value="Leadership Training/Team Building" {{ $reservation->activity == 'Leadership Training/Team Building' ? 'selected' : '' }}>Leadership Training/Team Building</option>
            <!-- Add other options based on your requirement -->
        </select>
    </div>

    <label for="description">Description (Optional):</label>
    <textarea id="description" name="description" rows="5" required>{{ $reservation->description }}</textarea>

    <button type="submit">Update Reservation</button>
</form>

<script>
    function showAdditionalDropdown() {
        var purposeDropdown = document.getElementById("purpose");
        var additionalDropdown = document.getElementById("additionalDropdown");

        // Check if "School Organization Events" is selected
        if (purposeDropdown.value === "Events") {
            additionalDropdown.style.display = "block";
        } else {
            additionalDropdown.style.display = "none";
        }
    }
</script>
            </div>
        </x-app-layout>  
    </div>
</div>

        <!-- Body end-->
</body>
</html>