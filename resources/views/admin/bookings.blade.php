<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- styles -->
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/tables.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->

    <!-- Body-->
    <div id="content">
        <div class="logout-container">
            <x-app-layout>
                @component('admin.reservation_table', ['bookings' => $bookings, 'status' => 'Pending'])
                    Reservations List
                @endcomponent
            </x-app-layout>
        </div>
    </div>
    <!-- Body end-->

    
</body>
</html>
