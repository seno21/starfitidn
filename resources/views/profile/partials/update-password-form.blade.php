<section>
    <div class="mb-4">
        <h4 class="text-dark">{{ __('Update Password') }}</h4>
        <p class="text-muted">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    </div>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input
                type="password"
                name="current_password"
                id="update_password_current_password"
                class="form-control @if($errors->updatePassword->get('current_password')) is-invalid @endif"
                autocomplete="current-password"
            >
            @if ($errors->updatePassword->get('current_password'))
                <div class="invalid-feedback">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input
                type="password"
                name="password"
                id="update_password_password"
                class="form-control @if($errors->updatePassword->get('password')) is-invalid @endif"
                autocomplete="new-password"
            >
            @if ($errors->updatePassword->get('password'))
                <div class="invalid-feedback">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input
                type="password"
                name="password_confirmation"
                id="update_password_password_confirmation"
                class="form-control @if($errors->updatePassword->get('password_confirmation')) is-invalid @endif"
                autocomplete="new-password"
            >
            @if ($errors->updatePassword->get('password_confirmation'))
                <div class="invalid-feedback">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <!-- Submit -->
        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <span class="text-success small">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>
