<x-admin>
    @section('title','Branch')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Branch Table</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.withdraw.create') }}" class="btn btn-sm btn-info">Customer Withdraw</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="categoryTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $transaction)
                        <tr>

                            <td>{{ $transaction->customer_name }}</td>
                            <td>{{ $transaction->phone }}</td>
                            <td>{{ $transaction->amount }}</td>
                            <td><a href="{{ route('cashier.deposit.edit', encrypt($transaction->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('cashier.deposit.destroy', encrypt($transaction->id)) }}"
                                    method="POST" onsubmit="return confirm('Are sure want to delete?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @section('js')

    @endsection
</x-admin>
