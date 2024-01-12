<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- styles -->
    <link href = "/css/custom.css" rel="stylesheet">
    <link href = "/css/tables.css" rel="stylesheet">
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
                    Reservations History</h1>

        
                    <table>
                        <thead>
                            <tr>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>User Type</th>
                                <th>Purpose</th>
                                <th>Activity</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservation as $reservation)
                                <tr>
                                    <td>{{ $reservation->venue }}</td>
                                    <td>{{ $reservation->date }}</td>
                                    <td>{{ $reservation->time }}</td>
                                    <td>{{ $reservation->status }}</td>
                                    <td>{{ $reservation->user_id }}</td>
                                    <td>{{ $reservation->name }}</td>
                                    <td>{{ $reservation->user_type }}</td>
                                    <td>{{ $reservation->purpose }}</td>
                                    <td>{{ $reservation->activity }}</td>
                                    <td>{{ $reservation->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </x-app-layout>  
    </div>
</div>
        <!-- Body end-->
    </script>
</body>
</html>