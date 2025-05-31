<x-admin>
    @section('title', 'Edit Branch Capital')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Branch Capital</h3>
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

            <form action="{{ route('admin.capital.branch.update', $capital->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="branch_id">Select Branch</label>
                    <select name="branch_id" id="branch_id" class="form-control" required>
                        <option value="">-- Choose Branch --</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $capital->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="amount">Amount (Tsh)</label>
                    <input type="number" name="amount" id="amount" class="form-control" step="0.01" min="0" value="{{ old('amount', $capital->amount) }}" required>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Update Capital</button>
            </form>
        </div>
    </div>
</x-admin>
