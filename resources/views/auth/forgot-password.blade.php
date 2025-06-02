<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="font-medium self-center text-xl sm:text-4xl uppercase text-gray-800 mb-2">
                <img src="{{Storage::url('img/logo4.png') }}" alt="" class="block h-16 w-36 ">
            </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-center ">
            {{ __('Actualmente el servicio para restablecer la contraseña por correo esta fuera de servicio!, comunícate con nuestros administradores para cambiar tu contraseña de forma manual') }}
        </div>

        {{-- @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button>
                    {{ __('Enlace de restablecimiento de contraseña') }}
                </x-button>
            </div> --}}
        </form>
    </x-authentication-card>
</x-guest-layout>
