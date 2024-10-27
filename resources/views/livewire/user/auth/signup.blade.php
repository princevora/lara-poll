<form wire:submit.prevent='save' role="form">
    <label>Name</label>
    <div class="mb-3">
        <input wire:model='name' wtype="text" class="form-control" placeholder="Enter your name" aria-label="Name"
            aria-describedby="name-addon">
    </div>
    <label>Email Address</label>
    <div class="mb-3">
        <input wire:model='email' type="email" class="form-control" placeholder="Enter your email address" aria-label="Email"
            aria-describedby="email-addon">
    </div>
    <label>Password</label>
    <div class="mb-3">
        <input wire:model='password' type="password" class="form-control" placeholder="Create a password" aria-label="Password"
            aria-describedby="password-addon">
    </div>
    <div class="form-check form-check-info text-left mb-0">
        <input wire:model='remember' name="remember_me" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="font-weight-normal text-dark mb-0" for="flexCheckDefault">
            Remember Me
        </label>
    </div>
    <div class="text-center">
        <button type="submit" class="d-flex justify-content-center gap-2 btn btn-dark w-100 mt-4 mb-3">
            Sign up

            <div wire:loading wire:target='save' class="spinner-border text-primary spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </button>
    </div>
</form>
