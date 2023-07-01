<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
<h1 class="text-base font-bold">Update support ticket</h1>
    <form method="POST" action="{{ route('ticket.update',$ticket->id) }}" enctype="multipart/form-data" >
        @csrf
        @method('patch')

        <!-- Email Address -->
        <div>
            <x-input-label for="title" :value="__('Title')"  />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$ticket->title}}"  autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea name="description"  id="description" value="{{$ticket->description}}"/>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />

        </div>

        <div class="mt-4">
            <x-input-label for="attachment" :value="__('attachment if existe')" />
            <x-file-input name="attachment" id="attachment"/>
            <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
            @if($ticket->attachment)
                <a href="{{"/storage/".$ticket->attachment}}" target="_blank">See Attachment</a>
        </div>
        @endif
        </div>



        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
