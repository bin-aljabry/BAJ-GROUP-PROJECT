<x-admin>
    @section('title','Till Number')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Till Number Table</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.till.create') }}" class="btn btn-sm btn-info">New Till (Agent Code)</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover" id="tillTable">
                <thead>
                    <tr>
                        <th>Till Name</th>
                        <th>Phone</th>
                        <th>Network</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tills as $till)
                        <tr>
                            <td>{{ $till->till_name }}</td>
                            <td>{{ $till->till_phone_no }}</td>
                            <td>{{ $till->network_provider }}</td>
                            <td>{{ $till->till_code }}</td>
                            <td>{{ $till->status }}</td>
                            <td>
                                <a href="{{ route('cashier.till.edit', $till->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('cashier.till.destroy', $till->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure want to delete this till?')">
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
                $('#tillTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
