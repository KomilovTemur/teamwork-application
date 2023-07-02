<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      Update Password
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      Ensure your account is using a long, random password to stay secure.
    </p>
  </header>

  <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('put')

    <div>
      <label class="w-100" for="current_password">
        Current Password
        <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
        @if ($error = $errors->updatePassword->get('current_password'))
        <div class="alert alert-danger">
          {{ $error[0] }}
        </div>
        @endif
      </label>
    </div>

    <div>
      <label class="w-100" for="password">
        New Password
        <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />

        @if ($error = $errors->updatePassword->get('password'))
        <div class="alert alert-danger">
          {{ $error[0] }}
        </div>
        @endif

      </label>
    </div>

    <div>
      <label class="w-100" for="password_confirmation">Confirm Password

        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
        @if ($error = $errors->updatePassword->get('password_confirmation'))
        <div class="alert alert-danger">
          {{ $error[0] }}
        </div>
        @endif
      </label>

    </div>

    <div class="flex items-center gap-4">
      <button class="btn btn-danger w-100 mt-2">Save</button>

      @if (session('status') === 'password-updated')
      <div class="alert alert-success mt-2">Saved</div>
      @endif
    </div>
  </form>
</section>
