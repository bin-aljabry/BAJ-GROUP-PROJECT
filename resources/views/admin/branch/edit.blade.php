<x-admin>
    @section('title','Edit Company')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Branch Profile</h3></div>
                    <form class="needs-validation" novalidate action="{{ route('admin.branch.update',$data) }}" method="POST">
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
                                <label for="address"> Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    placeholder="Enter category location" required value="{{ $data->address }}">
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
