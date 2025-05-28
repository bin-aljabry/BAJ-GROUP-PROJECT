<x-admin>
    @section('title', 'Add Bank Account')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Bank Account</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('cashier.bank-accounts.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="account_name">Account Name</label>
                            <input type="text" name="account_name" class="form-control" value="{{ old('account_name') }}" required>
                            @error('account_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name') }}" required>
                            @error('bank_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" name="account_number" class="form-control" value="{{ old('account_number') }}" required>
                            @error('account_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="user_id">Teller (Optional)</label>
                            <select name="user_id" class="form-control">
                                <option value="">Select Teller</option>
                                @foreach($tellers as $cashier)
                                    <option value="{{ $cashier->id }}" {{ old('user_id') == $cashier->id ? 'selected' : '' }}>
                                        {{ $cashier->name }} ({{ $cashier->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('cashier.bank-accounts.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>
