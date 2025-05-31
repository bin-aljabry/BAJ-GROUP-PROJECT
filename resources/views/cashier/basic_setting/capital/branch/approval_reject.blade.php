<x-admin>
    @section('title', 'Branch Capital Approval & Rejection')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Branch Capital Approval & Rejection</h3>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-striped" id="capitalApprovalTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Branch</th>
                        <th>Amount (Tsh)</th>
                        <th>Requested By</th>
                        <th>Status</th>
                        <th>Requested At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($capitals as $capital)
                        <tr>
                            <td>{{ $capital->id }}</td>
                            <td>{{ $capital->branch->name ?? 'N/A' }}</td>
                            <td>{{ number_format($capital->amount, 2) }}</td>
                            <td>{{ $capital->createdBy->name ?? 'N/A' }}</td>
                            <td>
                                @if($capital->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($capital->status == 'approved')
                                    <span class="badge badge-success">Approved</span>
                                @elseif($capital->status == 'rejected')
                                    <span class="badge badge-danger">Rejected</span>
                                @else
                                    <span class="badge badge-secondary">{{ ucfirst($capital->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $capital->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                @if($capital->status == 'pending')
                                    <a href="{{ route('cashier.capital.branch.approve', $capital->id) }}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure to approve this capital?')">Approve</a>
                                    <a href="{{ route('cashier.capital.branch.reject', $capital->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to reject this capital?')">Reject</a>
                                @else
                                    <span class="text-muted">No actions</span>
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
            $('#capitalApprovalTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true,
            });
        });
    </script>
    @endsection
</x-admin>
