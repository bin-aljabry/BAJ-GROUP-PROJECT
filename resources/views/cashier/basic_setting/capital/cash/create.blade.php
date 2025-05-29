<x-admin>
    @section('title', 'Add Cash Capital')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Cash Capital</h3>
        </div>

        <form method="POST" action="{{ route('cashier.capital.cash.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="teller_capital_id">Select Teller</label>
                    <select name="teller_capital_id" class="form-control" required>
                        <option value="">-- Select Teller --</option>
                        @foreach($tellerCapitals as $tc)
                            <option value="{{ $tc->id }}">
                                {{ $tc->teller->name }} (Teller Capital: {{ number_format($tc->amount, 2) }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="amount">Cash Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control" required>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-success">Save</button>
                <a href="{{ route('cashier.capital.cash.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-admin>
