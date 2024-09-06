<x-admin>
    @section('title','Edit Category')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.capital.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.capital.update',$data) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="userId" value="{{ $data->userId }}">
                        <input type="hidden" name="category" value="{{ $data->category }}">
                        <input type="hidden" name="agent_branch_teller_id" value="{{ $data->agent_branch_teller_id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="amount">Company </label>
                                <input type="text" class="form-control" id="amount" name="amount"
                                    placeholder="Enter category location" required value="{{ $data->amount }}">
                            </div>
                            <x-error>amount</x-error>
                          
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>
