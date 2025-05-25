<x-admin>
    @section('title','Company Admins')

@section('content')
<div class="container">
    <h3>Admin: {{ $admin->name }}</h3>
    <p>Email: {{ $admin->email }}</p>
    <p>Company: {{ $admin->company->name ?? 'N/A' }}</p>

    <h5>Users Registered by this Admin</h5>
    <ul>
        @foreach($admin->createdUsers as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
        @endforeach
    </ul>
</div>
@endsection
</x-admin>

