<x-admin>
    @section('title','Edit Permission')
    <section class="content">
        <!-- Default box -->
        <div class="d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Role {{ $role->name }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.role.index') }}"
                                class="btn btn-sm btn-dark">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="POST"

                        @csrf


                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Permission</label>
                                        <div class="row">


                                            @foreach ($permission as $permission)
                                            <div class="col-md-3">
                                                <input type="checkbox" class="form-control" name="permission[]" id="permission[]"
                                                required="" value="{{ $permission->id }}"{{ in_array($permission->id, $rolePermission)? 'checked':'' }}/>
                                                {{ $permission->name }}

@endforeach


                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-end float-right">
                            <button type="submit" id="submit"
                                class="btn btn-primary float-end float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
</x-admin>
