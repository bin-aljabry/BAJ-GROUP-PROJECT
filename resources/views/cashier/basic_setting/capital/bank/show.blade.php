<x-admin>
    @section('title', 'Bank Capital Details')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bank Capital Details</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $bankCapital->id }}</p>
            <p><strong>Teller Capital ID:</strong> {{ $bankCapital->tellerCapital->id ?? 'N/A' }}</p>
            <p><strong>Bank Name:</strong> {{ $bankCapital->bank_name }}</p>
            <p><strong>Account Number:</strong> {{ $bankCapital->account_number }}</p>
            <p><strong>Amount:</strong> {{ number_format($bankCapital->amount, 2) }}</p>
            <p><strong>Created At:</strong> {{ $bankCapital->created_at->format('d M Y, H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $bankCapital->updated_at->format('d M Y, H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('cashier.capital.bank.edit', $bankCapital->id) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('cashier.capital.bank.destroy', $bankCapital->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure you want to delete this bank capital?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            <a href="{{ route('cashier.capital.bank.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</x-admin>
