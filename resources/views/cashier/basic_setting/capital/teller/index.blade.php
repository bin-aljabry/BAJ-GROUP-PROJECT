<x-admin>
    @section('title', 'Teller Capitals')
     <div class="card">
        <div class="card-header">
             <h3 class="card-title">Teller Capitals</h3>

            <div class="card-tools">
               <a href="{{ route('cashier.capital.teller.create') }}" class="btn btn-primary">New Teller Capital</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Manager</th>
                        <th>Teller</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tellers as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->manager->name }}</td>
                        <td>{{ $item->teller->name }}</td>
                        <td>{{ number_format($item->amount, 2) }}</td>
                        <td>
                          <td>
    <a href="{{ route('cashier.capital.teller.show', $item->id) }}" class="btn btn-sm btn-info">View</a>
    <a href="{{ route('cashier.capital.teller.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
