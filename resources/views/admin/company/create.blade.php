<x-admin>
    @section('title','Create Company')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Company</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.company.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('admin.company.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Company Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Branch name" required value="{{ old('name') }}">
                            </div>
                            <x-error>name</x-error>

                            <div class="form-group">
                                <label for="number">Company ID</label>
                                <input type="text" class="form-control" id="number" name="number"
                                    placeholder="Enter Branch number" required value="{{ old('number') }}">
                            </div>
                            <x-error>number</x-error>

                            <div class="form-group">
                                <label for="brand">Brand Name</label>
                                <input type="text" class="form-control" id="brand" name="brand"
                                    placeholder="Enter brand" required value="{{ old('brand') }}">
                            </div>
                            <x-error>brand</x-error>


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
                    <label for="address">Company Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        placeholder="Enter Branch location" required value="{{ old('address') }}">
                </div>
                <x-error>address</x-error>
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
