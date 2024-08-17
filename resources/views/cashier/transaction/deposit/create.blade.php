<x-admin>
    @section('title','Create collection')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Customer Deposit</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.deposit.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.deposit.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="teller_name" class="form-label">Teller Name</label>
                                    <input name="teller_name" id="teller_name" class="form-control" required value=" {{ Auth::user()->name }}" required>
                                    <x-error>teller name</x-error>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="customer_name" class="form-label">Customer Name</label>
                                        <input type="text" name="customer_name" id="customer_name" placeholder="Enter Customer number"  required value="{{ old('name') }}" class="form-control" required>
                                        <x-error>Customer name</x-error>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="phone" name="phone" id="phone" class="form-control" required>
                                        <x-error>phone</x-error>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="deposit">Transaction Type</label>
                                        <input type="text" name="deposit" id="deposit"  value="DEPOSIT" class="form-control" required>
                                        <x-error>deposit</x-error>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="amount" name="amount" id="amount" class="form-control" required>
                                        <x-error>amount</x-error>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="transaction_id" class="form-label">Transaction ID</label>
                                        <input type="transaction_id" name="transaction_id" id="transaction_id" class="form-control" required>
                                        <x-error>Transaction id</x-error>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="date" class="form-label">Transaction ID</label>
                                        <input type="date" name="date" id="date" value="{{ date('H:i:s d-m-Y') }}" class="form-control" required>
                                        <x-error>date</x-error>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>
