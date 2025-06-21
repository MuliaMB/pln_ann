@extends('auth.layout')

@section('content')
<main class="login-form">
    
    <!-- img -->
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-bottom: 10px;">
        <img src="/image/logo-pln.png" alt="logo-pln" width="75px">
        <h5>Sign in to PLN Prediction</h5>
    </div>

    <!-- container -->
    <div style="display: flex; justify-content: center; align-items: center;">
        <div class="row justify-content-center m-0">
            <div class="col-auto p-0 d-flex justify-content-center">
                <div class="card glass-card"
                     style="border-radius: 8px; padding: 20px; width: 100%; max-width: 320px;">
                    <div class="card-body p-0">
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf

                            <!-- email -->
                            <div class="mb-3">
                                <label for="email_address" class="form-label" style="color: #ffffff; font-weight: 400;">
                                    Username or email address
                                </label>
                                <input type="text" id="email_address" name="email" required autofocus
                                       class="form-control"
                                       style="background-color: #0d1117; border: 1px solid #30363d; color: #c9d1d9;">
                                @if ($errors->has('email'))
                                    <span style="color: #f85149; font-size: 13px;">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <!-- password -->
                            <div class="mb-3">
                                <label for="password" class="form-label" style="color: #ffffff; font-weight: 400;">
                                    Password
                                </label>
                                <input type="password" id="password" name="password" required
                                       class="form-control"
                                       style="background-color: #0d1117; border: 1px solid #30363d; color: #c9d1d9;">
                                @if ($errors->has('password'))
                                    <span style="color: #f85149; font-size: 13px;">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <!-- remember me -->
                            <div class="mb-3 form-check d-flex align-items-center">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input me-2">
                                <label for="remember" class="form-check-label" style="color: #8b949e;">
                                    Remember Me
                                </label>
                            </div>

                            <!-- submit button -->
                            <div class="mb-3">
                                <button type="submit"
                                        class="btn w-100"
                                        style="background-color: #238636; color: white; font-weight: bold; border-radius: 6px;">
                                    Sign in
                                </button>
                            </div>

                            <!-- register link -->
                            <div class="text-center">
                                <p style="color: #8b949e; font-size: 14px; margin-bottom: 0;">
                                    New to PLN Prediction?
                                    <a href="{{ route('register') }}"
                                       style="color: #2f81f7; text-decoration: none; font-weight: 600"
                                       onmouseover="this.style.textDecoration='underline'"
                                       onmouseout="this.style.textDecoration='none'">
                                        Create an account
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div>
        </div>
    </div>
</main>
@endsection