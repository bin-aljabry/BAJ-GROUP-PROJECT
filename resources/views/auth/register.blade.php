<x-guest-layout>
@section('title')
    {{'Register'}}
@endsection
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>{{ config('app.name') }}</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register Company</p>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <h3>Company Information</h3>
                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <input type="text" class="form-control" name="company_name" required value="{{ old('company_name') }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone No</label>
                        <input type="text" class="form-control" name="company_phone" required value="{{ old('company_phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand Name</label>
                        <input type="text" class="form-control" name="brand" required value="{{ old('brand') }}">
                    </div>

                 
                    <div class="form-group">
                        <label for="company_email">Email</label>
                        <input type="text" class="form-control" name="company_email" required value="{{ old('company_email') }}">
                    </div>

                    <div class="form-group">
                        <label for="company_address">Company Address</label>
                        <input type="text" class="form-control" name="company_address" required value="{{ old('company_address') }}">
                    </div>

                    <h3>Admin Information</h3>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="name" required placeholder="Enter name">
                    </div>

                    <div class="input-group mb-3">
                        <input class="form-control" type="email" name="email" required placeholder="Enter email address">
                    </div>

                    <div class="input-group mb-3">
                        <input class="form-control" type="password" name="password" required placeholder="Enter password">
                    </div>

                    <div class="input-group mb-3">
                        <input class="form-control" type="password" name="password_confirmation" required placeholder="Re-enter password">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</x-guest-layout>
