<x-admin>
    @section('title', 'Edit Teller Capital')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cashier.capital.teller.update', $tellerCapital->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" value="{{ old('amount', $tellerCapital->amount) }}" class="form-control" required>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('cashier.capital.teller.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</x-admin>
