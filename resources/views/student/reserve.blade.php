<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Styles -->
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/forms.css" rel="stylesheet">
</head>
<body>

    @include('sweetalert::alert')

    <!-- Sidebar Navigation-->
    @include('student.sidebar')
    <!-- Sidebar Navigation end-->

    <!-- Body-->
    <div id="content">
        <div class="logout-container">
            <x-app-layout>
                <div class="page-content">
                    <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Reserve a Venue</h1>

                    <form action="{{url('user_reserve')}}" method="POST" enctype="multi/form-data">
                        @csrf

                        <label for="venue">Venue:</label>
                        <select id="venue" name="venue" required>
                            <option value="">Select Venue</option>
                            <option value="auditorium">Auditorium</option>
                            <option value="classroom">Classroom (A)</option>
                            <option value="classroom">Classroom (B)</option>
                            <option value="lab">Computer Lab</option>
                        </select>

                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" required>

                        <label for="time">Time:</label>
                        <input type="time" id="time" name="time" required>
                    <br>
                        <label for="purpose">Purpose:</label>
                        <select id="purpose" name="purpose" required onchange="showAdditionalDropdown()">
                            <option value="" disabled>Select Purpose</option>
                            <option value="Meetings">Meetings and Conferences</option>
                            <option value="Examinations">Examinations</option>
                            <option value="Events">School Organization</option>
                        </select>

                        <div id="additionalDropdown" style="display: none;">
                            <label for="activity">Nature of Activity:</label>
                            <select id="activity" name="activity">
                                <option value="">Select Event Type</option>
                                <option value="Workshop/Technical Training">Workshop/Technical Training</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>        

                        <label for="description">Description (Optional):</label>
                        <textarea id="description" name="description" rows="5" required></textarea>

                        <button type="submit">Submit Reservation</button>
                    </form>
                </div>
            </x-app-layout>  
        </div>
    </div>
    <!-- Body end-->

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

            // Get today's date in the format "YYYY-MM-DD"
            var today = new Date().toISOString().split('T')[0];

            // Set the min attribute of the date input to today
            document.getElementById("date").min = today;
        }
    </script>
</body>
</html>
