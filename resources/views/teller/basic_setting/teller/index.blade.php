<x-admin>
    @section('title', 'Company')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Company Table</h3>
            <a href="{{ route('cashier.teller.create') }}" class="btn btn-sm btn-info">New Teller</a>
        </div>

        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-striped" id="categoryTable" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Teller ID</th>
                        <th>Phone No</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $cat)
                        <tr>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->number }}</td>
                            <td>{{ $cat->phone }}</td>
                            <td>{{ $cat->address }}</td>
                            <td>
                                <a href="{{ route('cashier.teller.edit', $cat->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('cashier.teller.destroy', $cat->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure want to delete this teller?');">
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
                $('#categoryTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    responsive: true,
                });
            });
        </script>
    @endsection
</x-admin>
