<div class="page-content">
    <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
        {{ $slot }}
    </h1>

    <label for="statusFilter">Filter by Status:</label>
    <select id="statusFilter" onchange="filterReservations()">
        <option value="all">All</option>
        <option value="Pending">Pending</option>
        <option value="Approved">Approved</option>
        <option value="Rejected">Rejected</option>
        <option value="Cancelled">Cancelled</option>
    </select>

    <table id="reservationsTable">
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
                <tr data-status="{{ $reservation->status }}">
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

    <script>
    function filterReservations() {
        const statusFilter = document.getElementById('statusFilter').value;
        const tableRows = document.getElementById('reservationsTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');

        for (let i = 0; i < tableRows.length; i++) {
            const row = tableRows[i];
            const status = row.getAttribute('data-status');

            if (statusFilter === 'all' || status === statusFilter) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }
</script>
</div>
