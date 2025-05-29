<x-admin>
@section('title', 'Edit Till Capital')
<form action="{{ route('cashier.capital.till.update', $till->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="teller_capital_id">Teller Capital</label>
        <select name="teller_capital_id" class="form-control" required>
            @foreach($tellerCapitals as $cap)
                <option value="{{ $cap->id }}" {{ $cap->id == $till->teller_capital_id ? 'selected' : '' }}>
                    {{ $cap->teller->name }} - {{ number_format($cap->amount, 2) }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="till_name">Till Name</label>
        <input type="text" name="till_name" value="{{ $till->till_name }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" name="amount" step="0.01" value="{{ $till->amount }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
</x-admin>
