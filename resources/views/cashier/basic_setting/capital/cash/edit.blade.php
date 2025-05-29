<x-admin>
    @section('title', 'Edit Cash Capital')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Cash Capital</h3>
        </div>

        <form method="POST" action="{{ route('cashier.capital.cash.update', $cashCapital->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Teller</label>
                    <input type="text" class="form-control" value="{{ $cashCapital->tellerCapital->teller->name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="amount">Cash Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control" value="{{ $cashCapital->amount }}" required>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('cashier.capital.cash.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-admin>
