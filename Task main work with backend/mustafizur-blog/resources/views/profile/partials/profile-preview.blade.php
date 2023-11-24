<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Preview') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Your account's profile preview.") }}
        </p>
    </header>

    <div class="flex items-center space-x-4 mt-6">
        @if( $user->image)
        <div class="w-16 h-16 overflow-hidden rounded-full">
            <img src="{{ asset('storage/profile_images/' . $user->image) }}" alt="Profile Image" class="object-cover w-full h-full">
        </div>
        @else
        <div class="w-16 h-16 overflow-hidden rounded-full">
            <img src="https://cdn.vectorstock.com/i/1000x1000/43/95/default-avatar-photo-placeholder-icon-grey-vector-38594395.webp" alt="Profile Image" class="object-cover w-full h-full">
        </div>
        @endif

        <div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $user->name }}</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</p>

            <!-- Additional profile information can be displayed here -->
        </div>
    </div>

    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
    <div class="mt-4">
        <p class="text-sm text-gray-800 dark:text-gray-200">
            {{ __('Your email address is unverified.') }}

            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Click here to re-send the verification email.') }}
            </button>
        </p>

        @if (session('status') === 'verification-link-sent')
        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to your email address.') }}
        </p>
        @endif
    </div>
    @endif

    @if (session('status') === 'profile-updated')
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="mt-4 text-sm text-gray-600 dark:text-gray-400">{{ __('Profile information updated.') }}</p>
    @endif
</section>