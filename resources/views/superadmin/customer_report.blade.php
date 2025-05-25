<x-admin>
    @section('title','Customer Report')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registered Companies</h3>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-hover" id="customerReportTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Current Package</th>
                        <th>Payment Status</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->phone }}</td>
                            <td>{{ $company->currentPackage->name ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{
                                    $company->payment_status === 'paid' ? 'success' :
                                    ($company->payment_status === 'unpaid' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($company->payment_status) }}
                                </span>
                            </td>
                            <td>{{ $company->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
    <script>
        $(function () {
            $('#customerReportTable').DataTable();
        });
    </script>
    @endsection
</x-admin>
