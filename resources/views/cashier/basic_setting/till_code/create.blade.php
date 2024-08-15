<x-admin>
    @section('title','Create Category')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Category</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.till.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.till.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Till  Registed Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter category name" required value="{{ old('name') }}">
                            </div>
                            <x-error>name</x-error>

                            <div class="form-group">
                                <label for="number">Till Number</label>
                                <input type="text" class="form-control" id="number" name="number"
                                    placeholder="Enter category name" required value="{{ old('number') }}">
                            </div>
                            <x-error>number</x-error>

                            <div class="form-group">
                                <label for="type">Till Type</label>
                                <input type="text" class="form-control" id="type" name="type"
                                    placeholder="Enter category name" required value="{{ old('type') }}">
                            </div>
                            <div class="form-group">
                                <label for="agent_branch_teller_id" class="form-label">Teller Name</label>
                                <select name="agent_branch_teller_id" id="agent_branch_teller_id" class="form-control">
                                    <option value="" selected disabled>select the Teller </option>
                                    @foreach ($agent_branch_teller_id as $cat)
                                        <option {{ old($cat->id) == $cat->id ? 'selected' : '' }}
                                            value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-error>type</x-error>
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
