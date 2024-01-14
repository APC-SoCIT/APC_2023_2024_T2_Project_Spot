<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- styles -->
    <link href = "/css/custom.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> 



</head>

<body>
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        
        <!-- Body-->
        <div id="content">
    <div class="logout-container">
        <x-app-layout>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a new Venue</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('venues.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Venue</label>
                        <input type="text" class="form-control" name="venue" placeholder="Enter Venue">
                    </div>

                    <div class="form-group">
                        <label>Venue Type</label>
                        <input type="text" class="form-control" name="venue_type" placeholder="Enter Venue Type">
                    </div>

                    <div class="form-group">
                        <label>Floor</label>
                        <input type="text" class="form-control" name="floor" placeholder="Enter Floor number">
                    </div>

                    <div class="form-group">
                        <label>Body</label>
                        <input type="text" class="form-control" name="body" placeholder="Enter Body (description)">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



        
            <div class="page-content">
            <h1 class = "mt-6 text-xl font-semibold text-gray-900 dark:text-black ">
                    Venue Management</h1>
                    @if(count($errors) > 0)
            <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            </ul>
            </div>
            @endif

            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p> {{ \Session::get('success') }} </p>
                </div>
            @endif

            <a onclick="addForm()" class="btn btn-secondary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-top: -8px; float: right;">
  Add a Venue
</a>
<!--                    <a onclick="addForm()" class="btn btn-success pull-right" style="margin-top: -8px; float: right;"><i class="fa fa-plus"></i> Add a Venue</a>
 -->       </div>      


                    <!-- Button trigger modal -->





                    <p class = " font-semibold text-gray-900 dark:text-white font-size: 1px;">
                    hehe</p>

                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Venue</th>
                            <th>Venue Type</th>
                            <th>Floor</th>
                            <th>Body</th>
                            <th>Action</th>
                            <th width="105px">Images</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>    
                
            </div>

            <script type="text/javascript">
                $(function () {
 
                     var table = $('.data-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('admin.manage') }}",
                        columns: [
                            {data: 'id', name: 'id'},
                            {data: 'venue', name: 'venue'},
                            {data: 'venue type', name: 'venue type'},
                            {data: 'floor', name: 'floor'},
                            {data: 'body', name: 'body'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });
       
                });
            </script>

        </x-app-layout>  
    </div>
    


</div>



        <!-- Body end-->
</body>
</html>