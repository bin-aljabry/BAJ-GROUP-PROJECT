<x-admin>
    @section('title','Payment Report')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Payment Transactions</h3>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped" id="paymentReportTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company</th>
                        <th>Package</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Paid On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->company->name ?? 'N/A' }}</td>
                            <td>{{ $payment->package->name ?? 'N/A' }}</td>
                            <td>{{ number_format($payment->amount, 2) }} TZS</td>
                            <td>{{ ucfirst($payment->status) }}</td>
                            <td>{{ $payment->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
    <script>
        $(function () {
            $('#paymentReportTable').DataTable();
        });
    </script>
    @endsection
</x-admin>
