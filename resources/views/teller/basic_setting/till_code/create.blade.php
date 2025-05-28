<x-admin>
    @section('title', 'Add Till')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Till (Agent Code)</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('cashier.till.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                    <label for="till_name">Till Name</label>
                    <input type="text" name="till_name" class="form-control" value="{{ old('till_name') }}" required>
                    @error('till_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
           <div class="col-lg-6">
            <div class="form-group">
                   <label for="till_phone_no">Phone Number</label>
                    <input type="text" name="till_phone_no" class="form-control" value="{{ old('till_phone_no') }}" required>
                    @error('till_phone_no')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
           <div class="col-lg-6">
            <div class="form-group">
                    <label for="network_provider">Network Provider</label>
                    <select name="network_provider" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Vodacom">Vodacom</option>
                        <option value="Tigo">Tigo</option>
                        <option value="Airtel">Airtel</option>
                        <option value="Halotel">Halotel</option>
                        <option value="TTCL">TTCL</option>
                        <option value="Zantel">Zantel</option>
                    </select>
                    @error('network_provider')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
           <div class="col-lg-6">
            <div class="form-group">
                    <label for="till_code">Till Code</label>
                    <input type="text" name="till_code" class="form-control" value="{{ old('till_code') }}" required>
                    @error('till_code')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
           </div>
           <div class="col-lg-6">
            <div class="form-group">
                    <label for="till_code">Till Type</label>
                    <select name="till_type" class="form-control" required>
                        <option value="">Select</option>
                        <option value="standard">Wakala</option>
                        <option value="paymentline">Lipa Namba</option>
                    </select>
                    @error('till_type')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
           </div>
         
           <div class="col-lg-6">
           <div class="form-group">
            <label for="user_id">Assign to Teller</label>
            <select name="user_id" class="form-control" required>
                <option value="">Select Teller</option>
                @foreach($cashiers as $cashier)
                    <option value="{{ $cashier->id }}">{{ $cashier->name }} ({{ $cashier->email }})</option>
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
                <a href="{{ route('cashier.till.list') }}" class="btn btn-secondary">Cancel</a>
            </div>
           </div>
            </form>
        </div>
    </div>
</x-admin>
