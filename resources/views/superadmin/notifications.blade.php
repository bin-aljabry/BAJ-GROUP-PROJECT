<x-admin>
    @section('title','Customer Notifications')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Customer Feedback (Complaints, Suggestions, Challenges)</h3>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped table-hover" id="notificationsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->company->name ?? 'N/A' }}</td>
                            <td><span class="badge bg-info">{{ ucfirst($item->type) }}</span></td>
                            <td>{{ $item->message }}</td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
    <script>
        $(function () {
            $('#notificationsTable').DataTable();
        });
    </script>
    @endsection
</x-admin>
