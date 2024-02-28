<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <div class="container d-flex justify-content-center" style="margin-top: 17%">
        <div class="card"  style="max-width: 450px;">
            
            <div class="card-body ">
                <div class="text-center">
                <img src="{{ asset('img/Bilibeads-Logo.png') }}" alt="hello" class="img-fluid" style="max-width: 200px;">
                <p class="mb-4 text-sm text-muted">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password
                    reset link that will allow you to choose a new one.
                </p>
                </div>
    
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
    
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
    
                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label" > {{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                            required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
    
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    