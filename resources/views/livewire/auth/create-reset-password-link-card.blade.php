<div class="card">
    <div class="card-body">
        @if ($showForm)
            <h5>Kindly enter the email address you used for your account on this platform!</h5>
        @endif

        @if ($showForm)
            @livewire('auth.create-reset-password-link-form', )
        @else
            <div class="alert alert-success" role="alert">
                <h4>Password reset link sent to mail!</h4>
                <p>Kindly check your mail</p>
            </div>
        @endif
    </div>
</div>
