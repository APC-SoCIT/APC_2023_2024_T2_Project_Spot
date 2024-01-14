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
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <!-- Body-->
        <div id="content">
    <div class="logout-container">
        <x-app-layout>
            <div class="page-content">
                <h1 class = "mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                    Reservations List</h1>

                    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->venue }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->time }}</td>
                    <td>{{ $reservation->status }}</td>
                    <td>
                        <form action="{{ route('admin.approveReservation', $reservation->id) }}" method="post">
                            @csrf
                            <button type="submit">Approve</button>
                        </form>
                        <form action="{{ route('admin.rejectReservation', $reservation->id) }}" method="post">
                            @csrf
                            <button type="submit">Reject</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
            </div>
        </x-app-layout>  
    </div>
</div>
        <!-- Body end-->
</body>
</html>