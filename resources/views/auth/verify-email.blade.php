<x-layout title="Email Verification">

    <x-slot:heading>Email Verification</x-slot:heading>

    <x-auth-card title="Verify Your Email Address"
                 description="Before proceeding, please check your email for a verification link.">

        @if (session('status') == 'verification-link-sent')
            <x-alert type="success" class="mb-4">
                A fresh verification link has been sent to your email address.
            </x-alert>
        @endif

        <div class="text-center space-y-4">
            <p class="text-sm text-gray-600">
                If you did not receive the email,
            </p>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-button type="submit" variant="link">
                    Click here to request another
                </x-button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-button type="submit" variant="text" size="sm">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Sign out
                </x-button>
            </form>
        </div>
    </x-auth-card>
</x-layout>
