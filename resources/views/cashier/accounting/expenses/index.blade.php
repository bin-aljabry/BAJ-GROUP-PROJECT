<x-admin>
    @section('title','Expenses')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Expenses</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.expenses.create') }}" class="btn btn-sm btn-primary">Add</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="collectionTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Category</th>
                        <th>Approved</th>
                        <th>Vocher NO</th>
                        <th>Date</th>
                        <th>Remark</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $cat)
                    <tr>
                        <td>{{ $cat->expenditure }}</td>
                        <td>{{ $cat->amount }}</td>
                        <td>{{ $cat->date }}</td>
                        <td>{{ $cat->remark }}</td>
                        <td>{{ $cat->created }}</td>


                        
                        <td>
                            <form action="{{ route('cashier.branch.destroy', encrypt($cat->id)) }}" method="POST"
                                onsubmit="return confirm('Are sure want to delete?')">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                                <a href=""
                                    class="btn btn-sm btn-secondary">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action=""
                                    method="POST" onclick="confirm('Are you sure')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4" class="text-center bg-danger">Expeses not created</td>
                        </tr>

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
