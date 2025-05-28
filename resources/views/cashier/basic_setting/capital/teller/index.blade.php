
<x-admin>
@section('title', 'Teller Capital')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Teller Capital</h3>
        <div class="card-tools">
            <a href="{{ route('capital.teller.create') }}" class="btn btn-sm btn-primary">Add Teller Capital</a>
        </div>
    </div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped" id="collectionTable">
            <thead>
                <tr>
                    <th>Teller</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($capitals as $cap)
                    <tr>
                        <td>{{ $cap->teller->name ?? 'N/A' }}</td>
                        <td>{{ number_format($cap->amount, 2) }}</td>
                        <td><a href="{{ route('capital.teller.edit', $cap->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@section('js')
<script>
    $(function() {
        $('#collectionTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
        });
    });
</script>
@endsection
</x-admin>
