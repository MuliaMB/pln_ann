@extends('auth.layout')

@section('content')
<main class="login-form" style="background-color: #0d1117; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="card glass-card" style="border-radius: 8px; padding: 20px; max-width: 450px; width: 100%;">
        <div class="card-body">
            <h4 class="text-center mb-4" style="color: #ffffff;">Register to PLN Prediction</h4>

            <form action="{{ route('register.post') }}" method="POST">
                @csrf

                <!-- nama -->
                <div class="form-group mb-3">
                    <label for="name" style="color: #ffffff;">Name</label>
                    <input type="text" id="name" name="name" class="form-control"
                        style="background-color: #0d1117; border: 1px solid #30363d; color: #c9d1d9;" required autofocus>
                    @if ($errors->has('name'))
                        <small style="color: #f85149;">{{ $errors->first('name') }}</small>
                    @endif
                </div>

                <!-- email -->
                <div class="form-group mb-3">
                    <label for="email_address" style="color: #ffffff;">Email address</label>
                    <input type="email" id="email_address" name="email" class="form-control"
                        style="background-color: #0d1117; border: 1px solid #30363d; color: #c9d1d9;" required>
                    @if ($errors->has('email'))
                        <small style="color: #f85149;">{{ $errors->first('email') }}</small>
                    @endif
                </div>

                <!-- password -->
                <div class="form-group mb-3">
                    <label for="password" style="color: #ffffff;">Password</label>
                    <input type="password" id="password" name="password" class="form-control"
                        style="background-color: #0d1117; border: 1px solid #30363d; color: #c9d1d9;" required>
                    @if ($errors->has('password'))
                        <small style="color: #f85149;">{{ $errors->first('password') }}</small>
                    @endif
                </div>

                <!-- submit Register -->
                <div class="d-grid">
                    <button type="submit"
                        style="background-color: #238636; color: white; border: none; padding: 10px; font-weight: bold; border-radius: 6px; ">
                        Register
                    </button>
                </div>

                <p class="mt-3 text-center" style="color: #8b949e; font-weight: 600;">
                    Already have an account? <a href="{{ route('login') }}" style="color: #2f81f7;">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</main>
@endsection
