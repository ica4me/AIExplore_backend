<section>

    <!-- Tampilkan pesan sukses -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif



    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <!-- Full Name -->
        <div>
            <x-input-label for="fullname" :value="__('Full Name')" />
            <x-text-input id="fullname" name="fullname" type="text" class="mt-1 block w-full" :value="old('fullname', $user->fullname)" required autocomplete="fullname" />
            <x-input-error class="mt-2" :messages="$errors->get('fullname')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Caption -->
        <div>
            <x-input-label for="caption" :value="__('Caption')" />
            <x-text-input id="caption" name="caption" type="text" class="mt-1 block w-full" :value="old('caption', $user->caption)" autocomplete="caption" />
            <x-input-error class="mt-2" :messages="$errors->get('caption')" />
        </div>

        <!-- Join Date (Hanya Tampilan) -->
        <div>
            <x-input-label for="joindate" :value="__('Join Date')" />
            @if($user->created_at)
                <p class="mt-1 block w-full">{{ $user->created_at->format('Y-m-d') }}</p>
            @else
                <p class="mt-1 block w-full">{{ __('Not set') }}</p>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
