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
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <!-- Body-->
        <div id="content">
    <div class="logout-container">
        <x-app-layout>
            <div class="page-content">
                <h1 class = "mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                    Venue Management</h1>
            </div>
        </x-app-layout>  
    </div>
</div>
        <!-- Body end-->
</body>
</html>