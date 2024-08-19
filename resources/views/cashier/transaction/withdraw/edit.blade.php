<x-admin>
    @section('title','Edit Branch')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Branch</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.branch.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.branch.update',$data) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Branch Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter category name" required value="{{ $data->name }}">
                            </div>
                            <x-error>name</x-error>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="number">Branch Number</label>
                                <input type="text" class="form-control" id="number" name="number"
                                    placeholder="Enter category name" required value="{{ $data->number }}">
                            </div>
                            <x-error>number</x-error>
                        </div>
                         <div class="card-body">
                            <div class="form-group">
                                <label for="location">Branch Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    placeholder="Enter category location" required value="{{ $data->location }}">
                            </div>
                            <x-error>location</x-error>
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
