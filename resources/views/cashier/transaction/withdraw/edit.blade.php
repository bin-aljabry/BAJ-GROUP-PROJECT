<x-admin>
    @section('title','Edit Branch')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Withdraw</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.withdraw.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.withdraw.update', $data) }}"
                        method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="teller_name">Teller Name</label>
                                        <input type="text" class="form-control" id="teller_name" name="teller_name"
                                            placeholder="Enter Branch name" required value="{{ $data->teller_name }}">
                                    </div>
                                    <x-error>teller_name</x-error>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="till_number" class="form-label">till_number</label>
                                            <select name="till_number" id="till_number" class="form-control">
                                                <option value="" selected disabled>select the Company</option>
                                                @foreach ($teller_till as $cat)
                                                    <option {{ old($cat->id) == $cat->id ? 'selected' : '' }}
                                                        value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="customer_name">Customer Name</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name"
                                            placeholder="Enter Branch number" required value="{{ $data->customer_name }}">
                                    </div>
                                    <x-error>customer_name</x-error>
                                        </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone">Customer Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Enter Branch location" required value="{{ $data->phone}}">
                                    </div>
                                    <x-error>phone</x-error>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="transaction_id">Transaction Type</label>
                                        <input type="text" name="transaction_id" id="transaction_id"  value="WITHDRAW" class="form-control" required>
                                    </div>
                                        <x-error>transaction_id</x-error>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="amount" name="amount" id="amount" class="form-control" value="{{ $data->amount}}">
                                        </div>
                                            <x-error>amount</x-error>
                                        </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="transaction_id" class="form-label">Transaction ID</label>
                                        <input type="transaction_id" name="date" id="date" value="{{ $data->transaction_id}}" class="form-control" >
                                    </div>
                                        <x-error>date</x-error>
                                    </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @endsection
</x-admin>
