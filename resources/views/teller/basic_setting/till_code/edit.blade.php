<x-admin>
    @section('title','Edit Till Number')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Till Information</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.till.list') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>

                    <form class="needs-validation" novalidate action="{{ route('cashier.till.update', $till->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="till_name">Till Name</label>
                                <input type="text" class="form-control" id="till_name" name="till_name"
                                    value="{{ old('till_name', $till->till_name) }}" required>
                                <x-error>till_name</x-error>
                            </div>

                            <div class="form-group">
                                <label for="till_phone_no">Till Phone Number</label>
                                <input type="text" class="form-control" id="till_phone_no" name="till_phone_no"
                                    value="{{ old('till_phone_no', $till->till_phone_no) }}" required>
                                <x-error>till_phone_no</x-error>
                            </div>

                            <div class="form-group">
                                <label for="network_provider">Network Provider</label>
                                <input type="text" class="form-control" id="network_provider" name="network_provider"
                                    value="{{ old('network_provider', $till->network_provider) }}" required>
                                <x-error>network_provider</x-error>
                            </div>

                            <div class="form-group">
                                <label for="till_code">Till Code</label>
                                <input type="text" class="form-control" id="till_code" name="till_code"
                                    value="{{ old('till_code', $till->till_code) }}" required>
                                <x-error>till_code</x-error>
                            </div>

                            <div class="form-group">
                                <label for="user_id">Assigned Teller</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    <option value="">-- Select Teller --</option>
                                    @foreach ($cashiers as $cashier)
                                        <option value="{{ $cashier->id }}" {{ old('user_id', $till->teller_id) == $cashier->id ? 'selected' : '' }}>
                                            {{ $cashier->name }} ({{ $cashier->email }})
                                        </option>
                                    @endforeach
                                </select>
                                <x-error>user_id</x-error>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Update Till</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-admin>
