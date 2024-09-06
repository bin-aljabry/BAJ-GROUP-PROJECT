<x-admin>
    @section('title','Edit Permission')
    <section class="content">
        <!-- Default box -->
        <div class="d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Permission</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.income_category.index') }}"
                                class="btn btn-sm btn-dark">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->

                        <form action="{{ route('cashier.income_category.update',$data) }}" method="POST" class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="hidden" name="userId" value="{{ $data->userId }}">


                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">Income Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter category name" required value="{{ $data->name }}">
                                </div>
                                <x-error>name</x-error>

                                <div class="form-group">
                                    <label for="category">Remark/Description</label>
                                    <input type="text" class="form-control" id="category" name="category"
                                        placeholder="Enter category name" required value="{{ $data->category }}">
                                </div>
                                <x-error>category</x-error>

                            </div>
                        <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
</x-admin>
