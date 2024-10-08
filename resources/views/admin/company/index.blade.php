<x-admin>
    @section('title','Company')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Company Table</h3>
            <div class="card-tools">
                <a href="{{ route('admin.company.create') }}" class="btn btn-sm btn-info">New Company</a>
            </div>
        </div>

        <div class="card-body"  style="overflow-x:auto;">
            <table class="table table-striped" id="categoryTable">
                <div style="overflow-x:auto;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company ID</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $cat)
                        <tr>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->number }}</td>
                            <td>{{ $cat->phone }}</td>
                            <td>{{ $cat->location }}</td>
                            <td><a href="{{ route('admin.company.edit', encrypt($cat->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.company.destroy', encrypt($cat->id)) }}" method="POST"
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
