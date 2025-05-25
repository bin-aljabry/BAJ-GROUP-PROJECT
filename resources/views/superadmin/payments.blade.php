<x-admin>
    @section('title','Company Payments')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Payments</h3>
            <div class="card-tools">
                <a href="{{ route('admin.company.create') }}" class="btn btn-sm btn-info">New Company</a>
            </div>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped table-hover text-nowrap" id="paymentsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company</th>
                        <th>Package</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Payment Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payments as $payment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $payment->company->name ?? 'N/A' }}</td>
                        <td>{{ $payment->package->name ?? 'N/A' }}</td>
                        <td>{{ number_format($payment->amount, 2) }} TZS</td>
                        <td>
                            <span class="badge bg-{{ 
                                    $payment->status === 'paid' ? 'success' :
                                    ($payment->status === 'unpaid' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($payment->status) }}
                                </span>
                        </td>
                        <td>{{ $payment->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No payments found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
    <script>
        $(function() {
            $('#paymentsTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "responsive": true,
            });
        });
    </script>
    @endsection
</x-admin>