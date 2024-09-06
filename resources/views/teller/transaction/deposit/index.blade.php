<x-admin>
    @section('title','Deposit')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Deposit Table</h3>
<br>
            <div class="card-tools">
                <a href="{{ route('cashier.deposit.create') }}" class="btn btn-sm btn-info">Customer Deposit</a>
            </div>
        </div>
        <div class="card-tools" style="padding: 10px">
            <a href="{{ route('cashier.deposit.create') }}" class="btn btn-sm btn-success">Deposit Transaction Records</a>
        </div>
        <div class="card-body"  style="overflow-x:auto;">
            <table class="table table-striped" id="categoryTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $transaction)
                        <tr>

                            <td>{{ $transaction->customer_name }}</td>
                            <td>{{ $transaction->phone }}</td>
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
        <script>
            $(function() {
                $('#categoryTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
