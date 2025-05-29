<x-admin>
@section('title', 'Till Capital Details')
<div class="card">
    <div class="card-body">
        <h4><strong>Teller:</strong> {{ $till->tellerCapital->teller->name ?? '' }}</h4>
        <p><strong>Till Name:</strong> {{ $till->till_name }}</p>
        <p><strong>Amount:</strong> {{ number_format($till->amount, 2) }}</p>
    </div>
</div>
</x-admin>
