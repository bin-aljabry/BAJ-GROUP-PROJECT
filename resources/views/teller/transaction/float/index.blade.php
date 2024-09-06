<x-admin>
    @section('title','Deposit')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">float Table</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.float.create') }}" class="btn btn-sm btn-info">New</a>
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
                    @foreach ($data as $float)
                        <tr>

                            <td>{{ $float->amount }}</td>
                            <td>{{ $float->till_number }}</td>
                            <td><a href="{{ route('cashier.float.edit', encrypt($float->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('cashier.float.destroy', encrypt($float->id)) }}"
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
