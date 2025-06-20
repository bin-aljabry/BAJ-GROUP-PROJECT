<x-admin>
    @section('title', 'Edit Company')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Edit Teller</h3>
                    <a href="{{ route('cashier.teller.list') }}" class="btn btn-info btn-sm">Back</a>
                </div>

                <form action="{{ route('cashier.teller.update', $data->id) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $data->id }}">

                        <div class="form-group">
                            <label for="name">Teller Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                placeholder="Enter teller name" required value="{{ old('name', $data->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="number">Teller ID</label>
                            <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number"
                                placeholder="Enter teller ID" required value="{{ old('number', $data->number) }}">
                            @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_id">Teller Leader (User ID)</label>
                            <input type="text" class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id"
                                placeholder="Enter teller leader user ID" required value="{{ old('user_id', $data->user_id) }}">
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="agent_branch_id">Branch ID</label>
                            <input type="text" class="form-control @error('agent_branch_id') is-invalid @enderror" id="agent_branch_id" name="agent_branch_id"
                                placeholder="Enter branch ID" required value="{{ old('agent_branch_id', $data->agent_branch_id) }}">
                            @error('agent_branch_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone No</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                                placeholder="Enter phone number" required value="{{ old('phone', $data->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                placeholder="Enter email" required value="{{ old('email', $data->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Location</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                                placeholder="Enter location" required value="{{ old('address', $data->address) }}">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
