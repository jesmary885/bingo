<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="font-medium self-center text-xl sm:text-4xl uppercase text-gray-800 mb-2">
                <img src="{{Storage::url('img/logo4.png') }}" alt="" class="block h-16 w-36 ">
            </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esta es una zona segura de la aplicación. Confirme su contraseña antes de continuar..') }}
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Confirmar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
