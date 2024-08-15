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
                            <a href="{{ route('cashier.expenses.index') }}"
                                class="btn btn-sm btn-dark">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('cashier.expenses.store') }}" method="POST"
                        class="needs-validation" novalidate="">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Expenditure Category</label>
                                            <input type="text" class="form-control" name="category" id="category"
                                                required="" value="{{ old('category') }}">
                                                <x-error>Expenditure Category</x-error>
                                            <div class="invalid-feedback">Expenditure name field is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label"> Amount</label>
                                            <input type="text" class="form-control" name="amount" id="amount"
                                                required="" value="{{ old('amount') }}">
                                                <x-error>amount</x-error>
                                            <div class="invalid-feedback">Amount field is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label"> Paye</label>
                                            <input type="text" class="form-control" name="paye" id="paye"
                                                required="" value="{{ old('paye') }}">
                                                <x-error>paye</x-error>
                                            <div class="invalid-feedback">payee  field is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label"> Payment Voucher Number</label>
                                            <input type="text" class="form-control" name="voucher" id="voucher"
                                                required="" value="{{ old('voucher') }}">
                                                <x-error>voucher</x-error>
                                            <div class="invalid-feedback">Expenses name field is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Transaction Date </label>
                                            <input type="text" class="form-control" name="date" id="date"
                                                required="" value="{{ old('name') }}">
                                                <x-error>date</x-error>
                                            <div class="invalid-feedback">Transaction Date field is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label"> Remark</label>
                                            <input type="text" class="form-control" name="remark" id="remark"
                                                required="" value="{{ old('remark') }}">
                                                <x-error>remark</x-error>
                                            <div class="invalid-feedback">Expenses name field is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label"> Approved by</label>
                                            <input type="text" class="form-control" name="approved" id="approved"
                                                required="" value="{{ old('name') }}">
                                                <x-error>approved</x-error>
                                            <div class="invalid-feedback">Approved name field is required.</div>
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
