<x-admin>
    @section('title','Expenses')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Expenses Table</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.expenses.create') }}" class="btn btn-sm btn-info">New Expenses</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="categoryTable">
                <thead>
                    <tr>
                        <th>Expenditure For</th>
                        <th>Amount</th>

                        <th>Vocher NO</th>
                        <th>Remark</th>
                        <th>Payment by</th>
                        <th>Approved By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $cat)
                    <tr>
                        <td>{{ $cat->paye }}</td>
                        <td>{{ $cat->amount }}</td>
                        <td>{{ $cat->voucher_no }}</td>
                        <td>{{ $cat->remark }}</td>
                        <td>{{ $cat->date }}</td>
                        <td>{{ $cat->approval }}</td>
                        <td>{{ $cat->created_at }}</td>



                        <td><a href="{{ route('cashier.expenses.edit', encrypt($cat->id)) }}"
                            class="btn btn-sm btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('cashier.expenses.destroy', encrypt($cat->id)) }}" method="POST"
                            onsubmit="return confirm('Are sure want to delete?')">
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
