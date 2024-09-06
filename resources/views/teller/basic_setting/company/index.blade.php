<x-admin>
    @section('title','Company')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Company</h3>

                    </div>


            </div>

            <div class="card-tools" style="text-align: right; padding:5px">

            <a href="{{ route('cashier.company.create') }}" class="btn btn-sm btn-info">Add Company Detail</a>
        </div>
        <div class="card-body"  style="overflow-x:auto;">
            <table class="table table-striped" id="categoryTable">


                    @foreach ($data as $cat)

                           <tr><td><label for="name">Company Name:</label> {{ $cat->name }}</td></tr>
                         <tr><td><label for="name">Brand Name:</label> {{ $cat->brand }}</td></tr>
                            <tr>
                                <td><label for="name">Company Phone:</label> {{ $cat->phone }}</td>
                            </tr>
                            <tr>
                                <td><label for="name">Company Email:</label> {{ $cat->email }}</td>
                            </tr>
                          <tr> <td><label for="name">Company Address:</label> {{ $cat->address }}</td></tr>


                         <tr>  <td><a href="{{ route('cashier.company.edit', encrypt($cat->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a></td></tr>

                        </tr>
                    </div>
                        </div>
                    </div>
                    @endforeach

            </table>
        </div>
    </div>
    @section('js')
        <script>
            $(function() {
                $('#categoryTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
