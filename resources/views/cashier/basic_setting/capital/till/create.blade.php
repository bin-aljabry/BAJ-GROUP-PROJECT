<x-admin>
@section('title', 'Add Till Capital')
<form action="{{ route('cashier.capital.till.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="teller_capital_id">Teller Capital</label>
        <select name="teller_capital_id" class="form-control" required>
            @foreach($tellerCapitals as $cap)
                <option value="{{ $cap->id }}">{{ $cap->teller->name }} - {{ number_format($cap->amount, 2) }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="till_name">Till Name</label>
        <input type="text" name="till_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" name="amount" step="0.01" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
</x-admin>
