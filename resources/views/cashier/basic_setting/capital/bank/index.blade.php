<x-admin>
    @section('title', 'Bank Capitals')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bank Capitals</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.capital.bank.create') }}" class="btn btn-primary">New Bank Capital</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Teller Capital ID</th>
                        <th>Bank Name</th>
                        <th>Account Number</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bankCapitals as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tellerCapital->id ?? '-' }}</td>
                        <td>{{ $item->bank_name }}</td>
                        <td>{{ $item->account_number }}</td>
                        <td>{{ number_format($item->amount, 2) }}</td>
                        <td>
    <a href="{{ route('cashier.capital.bank.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
    <a href="{{ route('cashier.capital.bank.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

    <form action="{{ route('cashier.capital.bank.destroy', $item->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
    </form>
</td>
                    </tr>
                    @endforeach
                    @if($bankCapitals->isEmpty())
                        <tr><td colspan="6" class="text-center">No Bank Capitals found.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
