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
                        <th>Company Name</th>
                        <th>Company Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>
                            {{ ucfirst($company->payment_status) }}
                            <form method="POST" action="{{ route('superadmin.company.payment-status', $company->id) }}" class="d-inline">
                                @csrf @method('PATCH')
                                <button class="btn btn-sm btn-warning">Toggle</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('superadmin.company.user-limit', $company->id) }}">
                                @csrf @method('PATCH')
                                <input type="number" name="user_limit" value="{{ $company->user_limit ?? 5 }}" min="1">
                                <button class="btn btn-sm btn-primary">Set</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('superadmin.admin.show', $company->admin->id ?? 0) }}" class="btn btn-sm btn-info">View Admin</a>
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
