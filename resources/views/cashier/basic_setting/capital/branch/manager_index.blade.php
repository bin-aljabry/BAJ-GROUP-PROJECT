
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
                        <th>Amount (Tsh)</th>
                         <th>Created By</th>
                        <th>Status</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

@foreach ($capitals as $capital)
    <tr>
        <td>{{ $capital->id }}</td>
        <td>{{ $capital->amount }}</td>
        <td>{{ $capital->createdBy->name ?? 'Unknown' }}</td>
        <td>{{ $capital->status }}</td>
        <td>
            <a href="{{ route('cashier.capital.branch.show', $capital->id) }}" class="btn btn-info btn-sm">
                View
            </a>
        </td>
    </tr>
@endforeach
                </tbody></table>
        </div>
    </div>
</x-admin>
