<x-admin>
    @section('title', 'Branch Capital Details')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Branch Capital Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $capital->id }}</td>
                </tr>
                <tr>
                    <th>Branch</th>
                    <td>{{ $capital->branch->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Amount (Tsh)</th>
                    <td>{{ number_format($capital->amount, 2) }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($capital->status) }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $capital->createdBy->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $capital->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                @if($capital->approved_at)
                <tr>
                    <th>Approved At</th>
                    <td>{{ $capital->approved_at->format('d-m-Y H:i') }}</td>
                </tr>
                @endif
                @if($capital->approvedBy)
                <tr>
                    <th>Approved By</th>
                    <td>{{ $capital->approvedBy->name }}</td>
                </tr>
                @endif
            </table>

            @if($capital->status === 'pending')
            <hr>
            <h5>Manager Action</h5>
            <form action="{{ route('cashier.capital.branch.approve', $capital->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit" class="btn btn-success">Approve Capital</button>
            </form>

            <button class="btn btn-danger" data-toggle="modal" data-target="#rejectModal">Reject</button>

            <!-- Modal ya kukataa -->
            <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="POST" action="{{ route('cashier.capital.branch.reject', $capital->id) }}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Reject Capital</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="reason">Reason for Rejection</label>
                                    <textarea name="reason" id="reason" class="form-control" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Reject</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-admin>
