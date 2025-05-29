<x-admin>
    @section('title', 'Add Teller Capital')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cashier.capital.teller.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="teller_id"> Teller</label>
                    <select name="teller_id" class="form-control" required>
                        <option value="">-- select Teller --</option>
                        @foreach($tellers as $teller)
                            <option value="{{ $teller->id }}">{{ $teller->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" step="0.01" class="form-control" required>
                </div>

                <button class="btn btn-primary">Save</button>
                <a href="{{ route('cashier.capital.teller.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</x-admin>
