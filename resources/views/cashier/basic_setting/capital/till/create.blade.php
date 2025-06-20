<x-admin>
    @section('title', 'New Till Capital')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Till Capital</h3>
            <div class="card-tools">
                <a href="{{ route('cashier.capital.till.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('cashier.capital.till.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="teller_capital_id">Teller Capital</label>
                    <select name="teller_capital_id" id="teller_capital_id" class="form-control" required>
                        <option value="">-- Select Teller --</option>
                        @foreach($tellers as $teller)
                            <option value="{{ $teller->id }}">{{ $teller->teller->name ?? 'Teller #' . $teller->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="till_id">Till</label>
                    <select name="till_id" id="till_id" class="form-control" required>
                        <option value="">-- Select Till --</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" step="0.01" class="form-control" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Save Capital</button>
                </div>
            </form>
        </div>
    </div>

    @section('scripts')
    <script>
        document.getElementById('teller_capital_id').addEventListener('change', function () {
            let tellerId = this.value;
            let tillSelect = document.getElementById('till_id');
            tillSelect.innerHTML = '<option value="">Loading...</option>';

            fetch(`/cashier/capital/till/get-tills/${tellerId}`)
                .then(response => response.json())
                .then(data => {
                    tillSelect.innerHTML = '<option value="">-- Select Till --</option>';
                    data.forEach(till => {
                        tillSelect.innerHTML += `<option value="${till.id}">${till.till_name} - ${till.till_phone_no}</option>`;
                    });
                })
                .catch(error => {
                    console.error('Error fetching tills:', error);
                    tillSelect.innerHTML = '<option value="">-- Error Loading Tills --</option>';
                });
        });
    </script>
    @endsection
</x-admin>
