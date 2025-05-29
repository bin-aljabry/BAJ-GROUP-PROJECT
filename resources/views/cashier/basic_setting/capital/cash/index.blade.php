<x-admin>
    @section('title', 'Cash Capitals')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cash Capitals</h3>

            <div class="card-tools">
                <a href="{{ route('cashier.capital.cash.create') }}" class="btn btn-primary">New Cash Capital</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Teller</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cashCapitals as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tellerCapital->teller->name ?? 'N/A' }}</td>
                        <td>{{ number_format($item->amount, 2) }}</td>
                        <td>
                            <a href="{{ route('cashier.capital.cash.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('cashier.capital.cash.show', $item->id) }}" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
