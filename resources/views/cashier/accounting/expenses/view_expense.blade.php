<x-admin>
    @section('title','Expenses')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Expenses</h3>
           
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

                        <tr>
                            <td></td>
                            <td></td>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
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
