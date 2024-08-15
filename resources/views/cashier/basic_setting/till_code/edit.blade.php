<x-admin>
    @section('title','Edit Till Number')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Till Number</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.till.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.till.update',$data) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Till Registed Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter category name" required value="{{ $data->name }}">
                            </div>
                            <x-error>name</x-error>

                            <div class="form-group">
                                <label for="name">Till Number</label>
                                <input type="text" class="form-control" id="number" name="number"
                                    placeholder="Enter category name" required value="{{ $data->number }}">
                            </div>
                            <x-error>name</x-error>

                            <div class="form-group">
                                <label for="type">Till Type </label>
                                <input type="text" class="form-control" id="type" name="type"
                                    placeholder="Enter category name" required value="{{ $data->type }}">
                            </div>
                            <x-error>name</x-error>

                            <div class="form-group">
                                <label for="agent_branch_teller_id">Teller Name </label>
                                <input type="text" class="form-control" id="agent_branch_teller_id" name="agent_branch_teller_id"
                                    placeholder="Enter category name" required value="{{ $data->agent_branch_teller_id }}">
                            </div>
                            <x-error>name</x-error>

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
