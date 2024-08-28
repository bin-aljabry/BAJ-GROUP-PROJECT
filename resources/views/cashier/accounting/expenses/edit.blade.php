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
                    <form action="{{ route('cashier.expenses.update',$data) }}" method="POST" class="needs-validation" novalidate="">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="date" value="{{ $data->date }}">


                        <div class="card-body">
                            <div class="form-group">
                                <label for="expenditure">Expenditure </label>
                                <select name="expenditure" id="expenditure" class="form-control">
                                    @foreach ($expenditure as $cat)
                                        <option {{ old($cat->id) == $cat->id ? 'selected' : '' }}
                                            value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <x-error>expenditure</x-error>


                            <div class="form-group">
                                <label for="number">Expended For</label>
                                <input type="text" class="form-control" id="paye" name="paye"
                                    placeholder="Enter category name" required value="{{ $data->paye }}">
                            </div>
                            <x-error>paye</x-error>

                            <div class="form-group">
                                <label for="amount">Branch Location</label>
                                <input type="text" class="form-control" id="location" name="amount"
                                    placeholder="Enter category location" required value="{{ $data->amount }}">
                            </div>
                            <x-error>location</x-error>


                        <div class="form-group">
                            <label for="voucher_no">Payment Voucher No</label>
                            <input type="text" class="form-control" id="paye" name="voucher_no"
                                placeholder="Enter category name" required value="{{ $data->voucher_no }}">
                        </div>
                        <x-error>paye</x-error>

                        <div class="form-group">
                            <label for="remark">Remark</label>
                            <input type="text" class="form-control" id="remark" name="remark"
                                placeholder="Enter category location" required value="{{ $data->remark }}">
                        </div>
                        <x-error>remark</x-error>

                    <div class="form-group">
                        <label for="approval">Approved By</label>
                        <input type="text" class="form-control" id="approval" name="approval"
                            placeholder="Enter category location" required value="{{ $data->approval }}">
                    </div>
                    <x-error>approval</x-error>
                </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>



                                </div>
                            </div>

                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
</x-admin>
