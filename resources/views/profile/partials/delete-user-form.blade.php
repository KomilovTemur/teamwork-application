<section class="space-y-6">
  <header>

    <h2 class="text-lg font-medium text-gray-900">
      Delete Account
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
    </p>
    @if ($error = $errors->userDeletion->get('password'))
    <div class="alert alert-danger">
      {{$error[0]}}
    </div>
    @endif

  </header>

  <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">Delete Account</button>

  <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="confirm-user-deletion" focusable>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete your account?</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <p class="mt-1 text-sm text-gray-600">
              Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
            </p>

            <div>
              <label for="password">
                Password
                <input class="form-control my-2" id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="Password" />
              </label>
            </div>

            <div class="mt-6 flex justify-end">
              <button data-bs-dismiss="modal" class="btn btn-success" type="button" x-on:click="$dispatch('close')">
                Cancel
              </button>

              <button type="submit" class="btn btn-danger">
                Delete Account
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>

    {{-- <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
    @csrf
    @method('delete')

    <h2 class="text-lg font-medium text-gray-900">
      Are you sure you want to delete your account?
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
    </p>

    <div class="mt-6">
      <label for="password" class="sr-only">
        Password
        <input class="form-control" id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="Password" />
      </label>

      @if ($errors->userDeletion->get('password'))
      <div class="alert alert-danger">
        {{$errors->userDeletion->get('password')}}
      </div>
      @endif
    </div>

    <div class="mt-6 flex justify-end">
      <button class="btn btn-success" type="button" x-on:click="$dispatch('close')">
        Cancel
      </button>

      <button type="submit" class="btn btn-danger">
        Delete Account
      </button>
    </div>
    </form> --}}
  </div>
</section>
