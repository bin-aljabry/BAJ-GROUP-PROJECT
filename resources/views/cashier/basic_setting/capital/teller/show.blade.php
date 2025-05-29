<x-admin>
    @section('title', 'Teller Capital Details')

    <div class="card">
        <div class="mb-3">
        <a href="{{ route('cashier.capital.teller.index') }}" class="btn btn-secondary">
            ← Back to Teller Capitals
        </a>
    </div>

        <div class="card-header">
            <h3 class="card-title">Teller Capital Details</h3>
        </div>

        <div class="card-body">
            <h5><strong>Manager:</strong> {{ $tellerCapital->manager->name }}</h5>
            <h5><strong>Teller:</strong> {{ $tellerCapital->teller->name }}</h5>
            <h5><strong>Main Capital:</strong> {{ number_format($tellerCapital->amount, 2) }}</h5>

            <hr>

            <h4>💳 Till Capital</h4>
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Till Name</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tellerCapital->tillCapitals as $index => $till)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $till->till_name }}</td>
                        <td>{{ number_format($till->amount, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h4>💰 Cash Capital</h4>
            <ul>
                <li>Cash Amount: <strong>{{ number_format($summary['cash'], 2) }}</strong></li>
            </ul>

            <h4>🏦 Bank Capital</h4>
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bank Name</th>
                        <th>Account Number</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tellerCapital->bankCapitals as $index => $bank)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $bank->bank_name }}</td>
                        <td>{{ $bank->account_number }}</td>
                        <td>{{ number_format($bank->amount, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>
            <h3 class="text-right">🧮 Total: {{ number_format($summary['total'], 2) }}</h3>
        </div>
    </div>
</x-admin>
