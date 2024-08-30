<x-admin>
    @section('title','Branch')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Branch Table</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.income.create') }}" class="btn btn-sm btn-info">New Branch</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="categoryTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                        <th>Name</th>
                        <th>Action</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($income as $cat)
                        <tr>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->amount }}</td>
                            <td>{{ $cat->date }}</td>
                            <td>{{ $cat->userId }}</td>
                            <td>{{ $cat->category }}</td>


                            <td><a href="{{ route('cashier.income.edit', encrypt($cat->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('cashier.income.destroy', encrypt($cat->id)) }}" method="POST"
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
