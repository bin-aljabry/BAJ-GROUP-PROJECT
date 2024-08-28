<x-admin>
    @section('title','Create Permission')
    <section class="content">
        <!-- Default box -->
        <div class="d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New Income</h3>
                        <div class="card-tools">
                            <a href="{{ route('cashier.income_category.index') }}"
                                class="btn btn-sm btn-dark">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('cashier.income_category.store') }}" method="POST"
                        class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Income Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            required="" value="{{ old('name') }}">
                                            <x-error> Category</x-error>
                                        <div class="invalid-feedback">Expenditure name field is required.</div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="category" class="form-label"> Remark </label>
                                        <input type="text" class="form-control" name="category" id="category"
                                            required="" value="{{ old('category') }}">
                                            <x-error>approved</x-error>
                                        <div class="invalid-feedback">Remark name field is required.</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-right">
                            <button type="submit" id="submit"
                                class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
</x-admin>
