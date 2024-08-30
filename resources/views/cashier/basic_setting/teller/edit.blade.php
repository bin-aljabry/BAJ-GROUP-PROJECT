<x-admin>
    @section('title','Edit Company')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Teller</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.teller.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('cashier.teller.update',$data) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Teller Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter category name" required value="{{ $data->name }}">
                            </div>
                            <x-error>name</x-error>


                            <div class="form-group">
                                <label for="number">Teller ID</label>
                                <input type="text" class="form-control" id="number" name="number"
                                    placeholder="Enter category name" required value="{{ $data->number }}">
                            </div>
                            <x-error>number</x-error>


                            <div class="form-group">
                                <label for="user_id">Teller Leader</label>
                                <input type="text" class="form-control" id="user_id" name="user_id"
                                    placeholder="Enter category name" required value="{{ $data->user_id }}">
                            </div>
                            <x-error>Leader</x-error>


                            <div class="form-group">
                                <label for="agent_branch_id">Branch</label>
                                <input type="text" class="form-control" id="branch_id" name="agent_branch_id"
                                    placeholder="Enter category name" required value="{{ $data->agent_branch_id }}">
                            </div>
                            <x-error>Branch</x-error>



                            <div class="form-group">
                                <label for="phone">Phone No</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter category name" required value="{{ $data->phone }}">
                            </div>
                            <x-error>phone</x-error>


                            <div class="form-group">
                                <label for="phone">Email </label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter category name" required value="{{ $data->email }}">
                            </div>
                            <x-error>email</x-error>


                            <div class="form-group">
                                <label for="address">Location</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter category location" required value="{{ $data->address }}">
                            </div>
                            <x-error>address</x-error>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>
