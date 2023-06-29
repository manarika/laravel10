<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
User AVATAR        </h2>

    </header>

<img width="100" height="100" class="rounded" src="{{"/storage/$user->avatar"}}" alt="user-avatar">

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        generate  avatar from ai</p>

    <form method="post" action="{{route('profile.avatar.name')}}" >
        @csrf

        <x-primary-button>{{ __('generate avatar') }}</x-primary-button>

    </form>

    <p class="my-4 text-sm text-gray-600 dark:text-gray-400">
        OR </p>



@if (session('message'))
        <div class="text-red-500">
            {{ session('message') }}
        </div>
    @endif

    <form method="post" action="{{route('profile.avatar')}}" enctype="multipart/form-data" >
        @csrf
        @method('patch')

        <div>
            <x-input-label for="avatar" :value="__('upload avatar from computer')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)"  autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>



        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
