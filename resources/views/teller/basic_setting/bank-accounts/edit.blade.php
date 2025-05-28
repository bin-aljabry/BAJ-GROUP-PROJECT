<x-admin>
    @section('title', 'Edit Bank Account')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Bank Account</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('cashier.bank-accounts.update', $account->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Account Name</label>
                    <input type="text" name="account_name" class="form-control" value="{{ $account->account_name }}" required>
                </div>

                <div class="form-group">
                    <label>Bank Name</label>
                    <input type="text" name="bank_name" class="form-control" value="{{ $account->bank_name }}" required>
                </div>

                <div class="form-group">
                    <label>Account Number</label>
                    <input type="text" name="account_number" class="form-control" value="{{ $account->account_number }}" required>
                </div>

                <div class="form-group">
                    <label>Teller (Optional)</label>
                    <select name="teller_name" class="form-control">
                        <option value="">-- Select Teller --</option>
                        @foreach($tellers as $id => $name)
                            <option value="{{ $id }}" {{ $account->teller_name == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Account</button>
            </form>
        </div>
    </div>
</x-admin>
