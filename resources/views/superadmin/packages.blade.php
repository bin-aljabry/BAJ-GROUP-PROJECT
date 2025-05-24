<x-admin>
    @section('title','Package List')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Available Packages</h3>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped table-hover" id="packageTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $package->name }}</td>
                            <td>{{ number_format($package->price, 2) }} TZS</td>
                            <td>{{ $package->duration }} days</td>
                            <td>{{ $package->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
    <script>
        $(function () {
            $('#packageTable').DataTable();
        });
    </script>
    @endsection
</x-admin>
