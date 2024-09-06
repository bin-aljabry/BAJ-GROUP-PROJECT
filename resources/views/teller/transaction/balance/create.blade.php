<x-admin>
    @section('title','Create Branch')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Balance</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.balance.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.balance.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" id="type"  value="DEPOSIT" class="form-control" required>
                        <input type="hidden" name="teller_name" id="teller_name"  value="{{Auth::user()->name }}" class="form-control" required>
                        <div class="card-body">

                            <div class="row">


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="till_number" class="form-label">Till Number</label>

                                            <select name="till_number" id="till_number" class="form-control">
                                                <option value="" selected disabled>select the Company</option>
                                                @foreach ($teller_till as $cat)
                                                    <option {{ old($cat->number) == $cat->number ? 'selected' : '' }}
                                                        value="{{ $cat->number }}">{{ $cat->number }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="customer_name">Customer Name</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name"
                                            placeholder="Enter Branch number" >
                                    </div>
                                    <x-error>customer_name</x-error>
                                        </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone">Customer Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Enter Branch location" required value="{{ old('phone') }}">
                                    </div>
                                    <x-error>phone</x-error>
                                </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" name="amount" id="amount" class="form-control" required>
                                        </div>
                                            <x-error>amount</x-error>
                                        </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="teller_till_id" class="form-label">teller till </label>

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
                                            <label for="till_type" class="form-label">Till Type </label>

                                            <select name="till_type" id="till_type" class="form-control">
                                                <option  selected disabled>select the Teller</option>
                                                @foreach ($teller_till as $cat)
                                                <option>{{ $cat->type }}</option>
                                            @endforeach

                                            </select>
                                        </div>
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
