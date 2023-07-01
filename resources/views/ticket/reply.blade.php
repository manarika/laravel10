<x-app-layout>
    <!-- Session Status -->
    <div class="w-full sm:max-w-xl mt-6 px-6 shadow-md overflow-hidden ">
    @if($ticket->reply)
        <h1 >This The Latest Reply :</h1>
        <p class="bg-white font-medium text-blue-900">
            {{$ticket->reply}}
        </p>
    @endif
    </div>
    <form method="POST" action="{{ route('ticket.update',$ticket->id) }}" enctype="multipart/form-data" >
        @csrf
        @method('patch')
        <!-- ticket reply -->
        <div class="mt-4">
            <x-input-label for="reply" :value="__('reply')" />
            <x-textarea name="reply"  id="reply" value=null />
            <x-input-error :messages="$errors->get('reply')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('send_reply') }}
            </x-primary-button>
        </div>
    </form>

</x-app-layout>
