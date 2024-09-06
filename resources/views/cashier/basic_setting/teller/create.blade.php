<x-admin>
    @section('title','Create Teller')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Teller</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.teller.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.teller.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Teller Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Branch name" required value="{{ old('name') }}">
                            </div>
                            <x-error>name</x-error>


                            <div class="form-group">


                                <label for="user_id" class="form-label">Teller</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="" selected disabled>select the Company</option>
                                    @foreach ($company_id as $cat)
                                        <option {{ old($cat->id) == $cat->id ? 'selected' : '' }}
                                            value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="branch_id" class="form-label">Branch</label>
                                <select name="agent_branch_id" id="branch_id" class="form-control">
                                    <option value="" selected disabled>select the Company</option>
                                    @foreach ($branch_id as $cat)
                                        <option {{ old($cat->id) == $cat->id ? 'selected' : '' }}
                                            value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        <div class="form-group">
                            <label for="phone">Phone No</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter Branch location" required value="{{ old('phone') }}">
                        </div>
                        <x-error>phone</x-error>

                     <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                        placeholder="Enter Branch location" required value="{{ old('email') }}">
                </div>
                <x-error>email</x-error>
                <div class="form-group">
                    <label for="address">Teller Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        placeholder="Enter Branch location" required value="{{ old('address') }}">
                </div>
                <x-error>address</x-error>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password"
                        placeholder="Enter Branch location" required value="{{ old('password') }}">
                </div>
                <x-error>password</x-error>
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
