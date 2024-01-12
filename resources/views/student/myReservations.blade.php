<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- styles -->
    <link href = "/css/custom.css" rel="stylesheet">
    <link href = "/css/tables.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

                    @if(session()->has('message'))

                <div class="alert alert-success">
                

            {{session()->get('message')}}

                </div>

                    @endif
                <h1 class = "mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                    Reservations History</h1>

        
                    <table>
                        <thead>
                            <tr>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Purpose</th>
                                <th>Activity</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservation as $reservation)
                                <tr>
                                    <td>{{ $reservation->venue }}</td>
                                    <td>{{ $reservation->date }}</td>
                                    <td>{{ $reservation->time }}</td>
                                    <td>{{ $reservation->status }}</td>
                                    <td>{{ $reservation->purpose }}</td>
                                    <td>{{ $reservation->activity }}</td>
                                    <td>{{ $reservation->description }}</td>
                                    <td>
                                        <a href="" >Edit</a>
                                        |
                                        <a href="{{url('delete_myReservation', $reservation->id)}}" onclick="confirmation(event)">Cancel</a>
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
    <script type="text/javascript">

        function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        sweetAlert({
            title: "Are you sure to cancel?",
            text: "You will not be able to undo this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        
        .then((willCancel) => {
                if (willCancel) 
                {
                    window.location.href = urlToRedirect;                
                }  
            });          
        }
    </script>
</body>
</html>