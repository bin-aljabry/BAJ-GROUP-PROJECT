<x-admin>
    @section('title','Edit Company')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Branch</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.company.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('admin.company.update',$data) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Company Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter category name" required value="{{ $data->name }}">
                            </div>
                            <x-error>name</x-error>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="number">Company ID</label>
                                <input type="text" class="form-control" id="number" name="number"
                                    placeholder="Enter category name" required value="{{ $data->number }}">
                            </div>
                            <x-error>number</x-error>
                        </div>
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="brand">Brand Name</label>
                                <input type="text" class="form-control" id="brand" name="brand"
                                    placeholder="Enter category name" required value="{{ $data->brand }}">
                            </div>
                            <x-error>brand</x-error>
                        </div>
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="phone">Phone No</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter category name" required value="{{ $data->phone }}">
                            </div>
                            <x-error>phone</x-error>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="phone">Email </label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter category name" required value="{{ $data->email }}">
                            </div>
                            <x-error>email</x-error>
                        </div>
                         <div class="card-body">
                            <div class="form-group">
                                <label for="address"> Location</label>
                                <input type="text" class="form-control" id="location" name="address"
                                    placeholder="Enter category location" required value="{{ $data->address }}">
                            </div>
                            <x-error>address</x-error>
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
