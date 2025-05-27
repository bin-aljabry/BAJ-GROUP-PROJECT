<x-admin>
    @section('title','Till Number')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Till Number Table</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.till.create') }}" class="btn btn-sm btn-info">New</a>
            </div>
        </div>

        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-bordered" id="categoryTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tills as $till)
                        <tr>
                            <td>{{ $till->name }}</td>
                            <td>{{ $till->branch->name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('cashier.till.edit', encrypt($till->id)) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('cashier.till.destroy', encrypt($till->id)) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this till?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center">No till numbers found.</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Show pagination --}}
            <div class="mt-3">
                {{ $tills->links() }}
            </div>
        </div>
    </div>

    @section('js')
        <script>
            $(function() {
                $('#categoryTable').DataTable({
                    "paging": false, // Turn off DataTables paging since Laravel handles it
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
