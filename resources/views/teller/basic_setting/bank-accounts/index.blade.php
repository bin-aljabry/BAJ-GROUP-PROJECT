<x-admin>
    @section('title', 'Bank Accounts')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bank Account List</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.bank-accounts.create') }}" class="btn btn-sm btn-success">Add New Bank Account</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover" id="bankAccountTable">
                <thead>
                    <tr>
                        <th>Account Name</th>
                        <th>Bank Name</th>
                        <th>Account Number</th>
                        <th>Teller</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $account)
                        <tr>
                            <td>{{ $account->account_name }}</td>
                            <td>{{ $account->bank_name }}</td>
                            <td>{{ $account->account_number }}</td>
                            <td>{{ $account->teller?->name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('cashier.bank-accounts.edit', $account->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('cashier.bank-accounts.destroy', $account->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure want to delete this account?')">
                                    @csrf
                                    @method('DELETE')
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
        <script>
            $(function() {
                $('#bankAccountTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    responsive: true,
                });
            });
        </script>
    @endsection
</x-admin>
