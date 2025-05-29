<x-admin>
    @section('title', 'Edit Bank Capital')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Bank Capital</h3>
        </div>
        <form action="{{ route('cashier.capital.bank.update', $bankCapital->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="form-group">
                    <label for="teller_capital_id">Teller Capital</label>
                    <select name="teller_capital_id" id="teller_capital_id" class="form-control" required>
                        <option value="">-- Select Teller Capital --</option>
                        @foreach($tellerCapitals as $tc)
                            <option value="{{ $tc->id }}" {{ $bankCapital->teller_capital_id == $tc->id ? 'selected' : '' }}>
                                ID: {{ $tc->id }} - Teller: {{ $tc->teller->name ?? 'N/A' }}
                            </option>
                        @endforeach
                    </select>
                    @error('teller_capital_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="bank_name">Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name" class="form-control" value="{{ old('bank_name', $bankCapital->bank_name) }}" required>
                    @error('bank_name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="account_number">Account Number</label>
                    <input type="text" name="account_number" id="account_number" class="form-control" value="{{ old('account_number', $bankCapital->account_number) }}" required>
                    @error('account_number') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ old('amount', $bankCapital->amount) }}" required>
                    @error('amount') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Bank Capital</button>
                <a href="{{ route('cashier.capital.bank.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-admin>
