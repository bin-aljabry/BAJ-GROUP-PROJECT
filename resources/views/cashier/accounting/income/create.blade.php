<x-admin>
    @section('title','Create Branch')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Income Source</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.income.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.income.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="userId" value="{{ Auth::user()->id }}">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Income Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Branch name" required value="{{ old('name') }}">
                            </div>
                            <x-error>name</x-error>

                                <div class="form-group">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="" selected disabled>select the category</option>
                                        @foreach ($income as $cat)
                                            <option {{ old($cat->id) == $cat->id ? 'selected' : '' }}
                                                value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" id="amount" name="amount"
                                    placeholder="Enter Branch location" required value="{{ old('amount') }}">
                            </div>
                            <x-error>amount</x-error>
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
