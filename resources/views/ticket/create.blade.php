<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="post" action="{{route('login.github')}}" class="text-center">
        @csrf
        <x-primary-button class="ml-3">
            login with github
        </x-primary-button>
    </form>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="text"  required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea name="description" id="description"/>
            <x-input-error :messages="$errors->get('Description')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="attachment" :value="__('attachment if existe')" />
            <x-file-input name="attachment" id="attachment"/>
            <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
