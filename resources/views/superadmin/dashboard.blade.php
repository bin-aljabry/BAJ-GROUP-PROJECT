<x-admin>
    @section('title', 'Super Admin Dashboard')

    <div class="row">
        <!-- Total Companies -->
        <div class="col-md-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $totalCompanies }}</h3>
                    <p>Total Registered Companies</p>
                </div>
                <div class="icon"><i class="fas fa-building"></i></div>
            </div>
        </div>

        <!-- Paid Companies -->
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $paidCompanies }}</h3>
                    <p>Companies That Paid</p>
                </div>
                <div class="icon"><i class="fas fa-check-circle"></i></div>
            </div>
        </div>

        <!-- Unpaid Companies -->
        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $unpaidCompanies }}</h3>
                    <p>Companies That Haven't Paid</p>
                </div>
                <div class="icon"><i class="fas fa-times-circle"></i></div>
            </div>
        </div>

        <!-- Company Admins -->
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $adminCount }}</h3>
                    <p>Total Company Admins</p>
                </div>
                <div class="icon"><i class="fas fa-user-shield"></i></div>
            </div>
        </div>
    </div>

    <!-- Feedback Summary -->
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-success">
                <div class="card-header"><h5 class="card-title">Positive Feedback</h5></div>
                <div class="card-body text-center">
                    <h3>{{ $feedbackPositive }}</h3>
                    <p>Positive Comments</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-outline card-warning">
                <div class="card-header"><h5 class="card-title">Suggestions</h5></div>
                <div class="card-body text-center">
                    <h3>{{ $feedbackSuggestions }}</h3>
                    <p>Improvement Suggestions</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-outline card-danger">
                <div class="card-header"><h5 class="card-title">Challenges</h5></div>
                <div class="card-body text-center">
                    <h3>{{ $feedbackChallenges }}</h3>
                    <p>Customer Challenges</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart for Monthly Company Registrations -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Monthly Company Registrations</h3>
        </div>
        <div class="card-body">
            <canvas id="registrationChart" height="100"></canvas>
        </div>
    </div>

    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('registrationChart').getContext('2d');
        const registrationChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($monthlyRegistrations->pluck('month')->map(fn($m) => \Carbon\Carbon::create()->month($m)->format('F'))) !!},
                datasets: [{
                    label: 'Company Registrations',
                    data: {!! json_encode($monthlyRegistrations->pluck('count')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
    @endsection
</x-admin>
