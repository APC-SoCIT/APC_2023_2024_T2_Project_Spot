<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- styles -->
<<<<<<< HEAD
    <link href = "css/custom.css" rel="stylesheet">
=======
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/tables.css" rel="stylesheet">
>>>>>>> 7ccbfbc7aedbf603b51be444d74e5bfef5e92690
</head>
<body>
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->

<<<<<<< HEAD
        <!-- Body-->
        <div id="content">
    <div class="logout-container">
        <x-app-layout>
            <div class="page-content">
                <h1 class = "mt-6 text-xl font-semibold text-gray-900 dark:text-black">
                    Reservations List</h1> 
            </div>
        </x-app-layout>  
=======
    <!-- Body-->
    <div id="content">
        <div class="logout-container">
            <x-app-layout>
                @component('admin.reservation_table', ['bookings' => $bookings, 'status' => 'Pending'])
                    Reservations List
                @endcomponent
            </x-app-layout>
        </div>
>>>>>>> 7ccbfbc7aedbf603b51be444d74e5bfef5e92690
    </div>
    <!-- Body end-->

    
</body>
</html>
