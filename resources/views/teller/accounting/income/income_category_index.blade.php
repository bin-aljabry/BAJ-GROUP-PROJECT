<x-admin>
    @section('title','Income')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Income</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.income_category.create') }}" class="btn btn-sm btn-primary">Add New income</a>
            </div>
        </div>
        <div class="card-body"  style="overflow-x:auto;">
            <table class="table table-striped" id="collectionTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Remark</th>
                        <th>Category ID</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($income_category as $cat)
                    <tr>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->category }}</td>
                        <td>{{ $cat->number }}</td>

                        <td><a href="{{ route('cashier.income_category.edit', encrypt($cat->id)) }}"
                            class="btn btn-sm btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('cashier.income_category.destroy', encrypt($cat->id)) }}" method="POST"
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
                $('#collectionTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
