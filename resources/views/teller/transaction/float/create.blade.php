<x-admin>
    @section('title','Create collection')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Collection</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.float.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.float.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="row">
                                   <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" placeholder="Enter Amount" name="amount" id="amount" class="form-control" required>
                                        </div>
                                            <x-error>amount</x-error>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="agent_branch_teller_id" class="form-label">Agent Teller</label>

                                                <select name="agent_branch_teller_id" id="agent_branch_teller_id" class="form-control">
                                                    <option value="" selected disabled>select the Teller</option>
                                                    @foreach ($agent_branch_teller as $cat)
                                                        <option {{ old($cat->id) == $cat->id ? 'selected' : '' }}
                                                            value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="till_number" class="form-label">Agent Teller</label>

                                                <select name="till_number" id="till_number" class="form-control">
                                                    <option value="" selected disabled>select the Teller</option>
                                                    @foreach ($teller_till as $cat)
                                                        <option>{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="network_type" class="form-label">Till Type </label>

                                            <select name="network_type" id="network_type" class="form-control">
                                                <option  selected disabled>select the Teller</option>
                                                @foreach ($teller_till as $cat)
                                                <option>{{ $cat->type }}</option>
                                            @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="till_transaction_id" class="form-label">Till Type </label>

                                            <select name="till_transaction_id" id="till_transaction_id" class="form-control">
                                                <option  selected disabled>select the Teller</option>
                                                @foreach ($till_transaction as $cat)
                                                <option {{ old($cat->id) == $cat->id ? 'selected' : '' }}
                                                    value="{{ $cat->id }}">{{ $cat->type }}</option>
                                            @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="teller_till_id" class="form-label">Till Number</label>

                                            <select name="teller_till_id" id="teller_till_id" class="form-control">
                                                <option value="" selected disabled>select the Company</option>
                                                @foreach ($teller_till as $cat)

                                                    <option {{ old($cat->id) == $cat->id ? 'selected' : '' }}
                                                        value="{{ $cat->id }}">{{ $cat->number }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="date" class="form-label">Float From</label>
                                            <input type="text" placeholder="Enter Amount" name="date" id="date" class="form-control" required>
                                        </div>
                                            <x-error>amount</x-error>
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
