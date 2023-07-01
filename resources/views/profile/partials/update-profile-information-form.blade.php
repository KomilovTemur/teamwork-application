<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Profile Information') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __("Update your account's profile information and email address.") }}
    </p>
  </header>

  <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
  </form>

  <form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')
    @if (session('status') === 'profile-updated')
    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="alert alert-success">{{ __('Saved.') }}</div>
    @endif

    <label for="name" class="w-100">
      <input class="form-control" id="name" name="name" type="text" class="mt-1 block w-full" value="{{old('name', $user->name)}}" required autofocus autocomplete="name" />
    </label>
    @if ($errors->get('name'))
    <div class="alert alert-danger">
      {{$errors->get('name')}}
    </div>
    @endif

    <label for="email" class="w-100">
      <input id="email" class="form-control my-2" name="email" type="email" class="mt-1 block w-full" value="{{old('email', $user->email)}}" required autocomplete="email" />
    </label>
    @if ($errors->get('email'))
    <div class="alert alert-danger">
      {{$errors->get('email')}}
    </div>
    @endif
    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

    <p class="text-sm mt-2 text-gray-800">
      {{ __('Your email address is unverified.') }}

      <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        {{ __('Click here to re-send the verification email.') }}
      </button>
    </p>

    @if (session('status') === 'verification-link-sent')
    <p class="mt-2 font-medium text-sm text-green-600">
      {{ __('A new verification link has been sent to your email address.') }}
    </p>
    @endif
    @endif
    <button type="submit" class="btn btn-success w-100">Save</button>
  </form>

</section>
