<x-admin>
    @section('title','Create Category')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Capital</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.capital.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.capital.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" id="amount" name="amount"
                                    placeholder="Enter category name" required value="{{ old('amount') }}">

                            </div>

                            <x-error>amount</x-error>
                            <div class="form-group">
                                <label for="agent_branch_teller_id" class="form-label">Teller Name</label>
                                <select name="agent_branch_teller_id" id="agent_branch_teller_id" class="form-control">
                                    <option value="" selected disabled>select the Company</option>
                                    @foreach ($teller as $cat)
                                        <option {{ old($cat->id) == $cat->id ? 'selected' : '' }}
                                            value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
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
