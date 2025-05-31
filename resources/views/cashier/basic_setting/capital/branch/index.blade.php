<x-admin>
    @section('title', 'Branch Capitals')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Branch Capital Table</h3>
            <div class="card-tools">
                <a href="{{ route('admin.capital.branch.create') }}" class="btn btn-sm btn-primary">Add New Capital</a>
            </div>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-striped" id="capitalTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Branch</th>
                        <th>Amount (Tsh)</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Approved By</th>
                        <th>Approved At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($capitals as $capital)
                    <tr>
                        <td>{{ $capital->id }}</td>
                        <td>{{ $capital->branch->name ?? 'N/A' }}</td>
                        <td>{{ number_format($capital->amount, 2) }}</td>
                        <td>{{ ucfirst($capital->status) }}</td>
                        <td>{{ $capital->createdBy->name ?? 'N/A' }}</td>
                        <td>{{ $capital->approvedBy->name ?? '-' }}</td>
                        <td>{{ $capital->approved_at ? $capital->approved_at->format('d-m-Y H:i') : '-' }}</td>
                        <td>
                            <a href="{{ route('admin.capital.branch.edit', $capital->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.capital.branch.destroy', $capital->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this capital?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>

                            @if($capital->status == 'pending' && auth()->user()->role === 'manager')
                                <a href="{{ route('cashier.capital.branch.approve', $capital->id) }}" class="btn btn-sm btn-success">Approve</a>
                                <a href="{{ route('cashier.capital.branch.reject', $capital->id) }}" class="btn btn-sm btn-secondary">Reject</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
    <script>
        $(function() {
            $('#capitalTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true,
            });
        });
    </script>
    @endsection
</x-admin>
