<x-admin>
    @section('title', 'Add Branch Capital')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Branch Capital</h3>
            <div class="card-tools">
                <a href="{{ route('admin.capital.branch.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.capital.branch.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="branch_id">Select Branch</label>
                    <select name="branch_id" id="branch_id" class="form-control" required>
                        <option value="">-- Choose Branch --</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="amount">Amount (Tsh)</label>
                    <input type="number" name="amount" id="amount" class="form-control" step="0.01" min="0" value="{{ old('amount') }}" required>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Save Capital</button>
            </form>
        </div>
    </div>
</x-admin>
