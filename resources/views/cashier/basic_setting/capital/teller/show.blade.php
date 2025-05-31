<x-admin>
    @section('title', 'Teller Capital Details')

    
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Teller Capital Details</h3>

            <div>
                {{-- Print Button --}}
                <button onclick="window.print()" class="btn btn-primary btn-sm mr-2">
                    🖨️ Print
                </button>

                {{-- Download PDF Button --}}
                <a href="{{ route('cashier.capital.teller.download', $tellerCapital->id) }}" class="btn btn-success btn-sm" target="_blank" rel="noopener">
                    ⬇️ Download PDF
                </a>
            </div>
        </div>

        <div class="card-body">
            {{-- Existing content here --}}
            {{-- ... (meza na maelezo yako kama ulivyokuwa umeweka) --}}
        </div>
    </div>
        <div class="card-body">

            {{-- Main info --}}
            <table class="table table-bordered mb-4">
                <tr>
                    <th>Manager</th>
                    <td colspan="2">{{ $tellerCapital->manager->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Teller</th>
                    <td colspan="2">{{ $tellerCapital->teller->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Main Capital</th>
                    <td colspan="2">{{ number_format($tellerCapital->amount, 2) }} TZS</td>
                </tr>
            </table>


             <table class="table table-bordered mt-4">
                <tr>
                    <th>Created At</th>
                    <td colspan="2">{{ \Carbon\Carbon::parse($tellerCapital->created_at)->format('d-m-Y H:i') }}</td>
                </tr>
                @if($tellerCapital->approved_at)
                <tr>
                    <th>Approved At</th>
                    <td colspan="2">{{ \Carbon\Carbon::parse($tellerCapital->approved_at)->format('d-m-Y H:i') }}</td>
                </tr>
                @endif
                @if($tellerCapital->approvedBy)
                <tr>
                    <th>Approved By</th>
                    <td colspan="2">{{ $tellerCapital->approvedBy->name }}</td>
                </tr>
                @endif
            </table>

            <br>
            {{-- Till Capitals --}}
            <h5>💳 Till Capitals</h5>
            @if($tellerCapital->tillCapitals->count())
                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>Till Name</th>
                            <th>Account Number</th>
                            <th>Amount (TZS)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tellerCapital->tillCapitals as $till)
                        <tr>
                            <td>{{ $till->till_name }}</td>
                            <td>{{ $till->till_number  ?? '-' }}</td>
                            <td class="text-right">{{ number_format($till->amount, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No till capitals available.</p>
            @endif

            {{-- Bank Capitals --}}
            <h5>🏦 Bank Capitals</h5>
            @if($tellerCapital->bankCapitals->count())
                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Amount (TZS)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tellerCapital->bankCapitals as $bank)
                        <tr>
                            <td>{{ $bank->bank_name }}</td>
                            <td>{{ $bank->account_number }}</td>
                            <td class="text-right">{{ number_format($bank->amount, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No bank capitals available.</p>
            @endif

            {{-- Cash and Total summary --}}
            <table class="table table-bordered">
                <tr>
                    <th>Cash Capital</th>
                    <td colspan="2" class="text-right">{{ number_format($summary['cash'], 2) }} TZS</td>
                </tr>
                <tr>
                    <th>Total Capital</th>
                    <td colspan="2" class="text-right"><strong>{{ number_format($summary['total'], 2) }} TZS</strong></td>
                </tr>
            </table>

            {{-- Dates and Approvals --}}


        </div>
    </div>
</x-admin>
