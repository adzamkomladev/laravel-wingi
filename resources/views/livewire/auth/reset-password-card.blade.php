<div class="card">
    <div class="card-body">
        <h3>Hello {{ $user->name }}</h3>
        @if ($showForm)
            <p>Kindly reset your password below!</p>
        @endif

        @if ($showForm)
            @livewire('auth.reset-password-form', ['user' => $user])
        @else
            <div class="alert alert-success" role="alert">
                <h4>Password reset complete!</h4>
                <p>Kindly click on this <a href="{{ route('auth.login.show') }}">link</a> to login into your account
                </p>
            </div>
        @endif
    </div>
</div>
