<x-admin>
    @section('title', 'Create User')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Create User</h3>
            <a href="{{ route('cashier.teller.list') }}" class="btn btn-sm btn-dark">Back</a>
        </div>

        <div class="card-body">
            <form action="{{ route('cashier.teller.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Name:*</label>
                            <input type="text" id="name" name="name" class="form-control" required
                                value="{{ old('name') }}" placeholder="Enter user name" aria-label="Name">
                            <x-error field="name" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="branch_id" class="form-label">Branch:*</label>
                            <select name="branch_id" id="branch_id" class="form-control" required aria-label="Branch">
                                <option value="">-- Select Branch --</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}"
                                        {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-error field="branch_id" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email:*</label>
                            <input type="email" id="email" name="email" class="form-control" required
                                value="{{ old('email') }}" placeholder="Enter email" aria-label="Email">
                            <x-error field="email" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password:*</label>
                            <input type="password" id="password" name="password" class="form-control" required
                                aria-label="Password">
                            <x-error field="password" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role" class="form-label">Role:*</label>
                            <select name="role" id="role" class="form-control" required aria-label="Role">
                                <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Select Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-error field="role" />
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center">
                        <a href="#" class="btn btn-sm btn-success">Add User Permission</a>
                    </div>

                    <div class="col-lg-12">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>
