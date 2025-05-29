<x-admin>
    @section('title', 'Cash Capital Details')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cash Capital Details</h3>
        </div>

        <div class="card-body">
            <p><strong>Teller:</strong> {{ $cashCapital->tellerCapital->teller->name }}</p>
            <p><strong>Amount:</strong> {{ number_format($cashCapital->amount, 2) }}</p>
            <p><strong>Date:</strong> {{ $cashCapital->created_at->format('d M Y H:i') }}</p>
        </div>

        <div class="card-footer">
            <a href="{{ route('cashier.capital.cash.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</x-admin>
