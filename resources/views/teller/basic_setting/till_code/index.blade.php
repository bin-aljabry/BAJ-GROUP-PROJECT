<x-admin>
    @section('title','Till Number')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Till Number Table</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.till.create') }}" class="btn btn-sm btn-info">New Till (Agent Code)</a>
            </div>
        </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Till Name</th>
                <th>Phone</th>
                <th>Network</th>
                <th>Code</th>
                <th>Status</th>
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
                </tr>
            @endforeach
        </tbody>
                <tr>
                            <td>{{ $cat->name }}</td>
                            <td><a href="{{ route('cashier.till.edit', encrypt($cat->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('cashier.till.destroy', encrypt($cat->id)) }}" method="POST"
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
