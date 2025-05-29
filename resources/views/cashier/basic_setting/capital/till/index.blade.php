<x-admin>
@section('title', 'Till Capitals')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Till Capitals</h3>
        <div class="card-tools">
            <a href="{{ route('cashier.capital.till.create') }}" class="btn btn-primary">New Till Capital</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Teller</th>
                    <th>Till Name</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tills as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tellerCapital->teller->name ?? '' }}</td>
                    <td>{{ $item->till_name }}</td>
                    <td>{{ number_format($item->amount, 2) }}</td>
                    <td>
                        <a href="{{ route('cashier.capital.till.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('cashier.capital.till.show', $item->id) }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-admin>
