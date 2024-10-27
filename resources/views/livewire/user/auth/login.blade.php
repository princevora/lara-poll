<div class="col-md-4 d-flex flex-column mx-auto">
    <div class="card card-plain mt-8">
        <div class="card-header pb-0 text-left bg-transparent">
            <h3 class="font-weight-black text-dark display-6">
                Sign In
            </h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent='save' role="form">
                <label>Email Address</label>
                <div class="mb-3">
                    <input wire:model='email' type="email" class="form-control" placeholder="Enter your email address"
                        aria-label="Email" aria-describedby="email-addon">

                    @error('email')
                        <small class="text-danger text-small">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <label>Password</label>
                <div class="mb-3">
                    <input wire:model='password' type="password" class="form-control" placeholder="Create a password"
                        aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                        <small class="text-danger text-small">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-check form-check-info text-left mb-0">
                    <input wire:model='remember' name="remember_me" class="form-check-input" type="checkbox"
                        value="" id="flexCheckDefault">
                    <label class="font-weight-normal text-dark mb-0" for="flexCheckDefault">
                        Remember Me
                    </label>
                </div>
                <div class="text-center">
                    <button type="submit" class="d-flex justify-content-center gap-2 btn btn-dark w-100 mt-4 mb-3">
                        Sign In

                        <div wire:loading wire:target='save' class="spinner-border text-primary spinner-border-sm"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
            </form>

        </div>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
            <p class="mb-4 text-xs mx-auto">
                Dont have an account?
                <a href="{{ route('auth.signup') }}" wire:navigate class="text-dark font-weight-bold">Sign Up</a>
            </p>
        </div>
    </div>
</div>
