<x-admin>
    @section('title','Create Permission')
    <section class="content">
        <!-- Default box -->
        <div class="d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New Expenses</h3>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="expenditure" class="form-label">Expenditure Category</label>
                                        <select name="expenditure" id="expenditure" class="form-control">
                                            <option value="" selected disabled>select the Expenditure</option>
                                            @foreach ($expenditure as $cat)
                                                <option {{ old($cat->id) == $cat->id ? 'selected' : '' }}
                                                    value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="amount" class="form-label"> Amount</label>
                                        <input type="text" class="form-control" name="amount" id="amount"
                                            required="" value="{{ old('amount') }}">
                                            <x-error>amount</x-error>
                                        <div class="invalid-feedback">Amount field is required.</div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Expenditure For </label>
                                        <input type="text" class="form-control" name="paye" id="paye"
                                            required="" value="{{ old('paye') }}">
                                            <x-error>paye</x-error>
                                        <div class="invalid-feedback">payee  field is required.</div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="voucher_no" class="form-label"> Payment Voucher Number</label>
                                        <input type="text" class="form-control" name="voucher_no" id="voucher_no"
                                            required="" value="{{ old('voucher_no') }}">
                                            <x-error>voucher</x-error>
                                        <div class="invalid-feedback">Expenses name field is required.</div>
                                    </div>
                                </div>
                              
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="remark" class="form-label"> Remark</label>
                                        <input type="text" class="form-control" name="remark" id="remark"
                                            required="" value="{{ old('remark') }}">
                                            <x-error>remark</x-error>
                                        <div class="invalid-feedback">Expenses name field is required.</div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="approval" class="form-label"> Approved by</label>
                                        <input type="text" class="form-control" name="approval" id="approval"
                                            required="" value="{{ old('name') }}">
                                            <x-error>approved</x-error>
                                        <div class="invalid-feedback">Approved name field is required.</div>
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
