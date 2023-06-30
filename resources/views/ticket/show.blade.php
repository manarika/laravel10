<x-app-layout>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" >
    <h1 class="text-center">                {{$ticket->title}}
    </h1>
<div class="w-full sm:max-w-xl mt-6 px-6 shadow-md overflow-hidden " >

        <div class=" text-gray-100  flex justify-between  bg-white py-4
        " >
            <p >
                {{$ticket->description}}
            </p>
            <p>
                {{$ticket->created_at->diffForHumans()}}
            </p>
            @if($ticket->attachment)
            <a href="{{"/storage/".$ticket->attachment}}" target="_blank">Attachment</a>
        </div>
    @endif
    <div class="flex justify-between">
        <div class="flex">
        <a href="{{route('ticket.edit',$ticket->id)}}" >
            @csrf
            <x-primary-button>Edit</x-primary-button>
        </a>
            <form class="ml-1" action="{{route('ticket.destroy',$ticket->id)}}" method="post">
        @method('delete')
        @csrf
        <x-primary-button>Delete</x-primary-button>
            </form>
        </div>

    <div class="flex ">
    <x-primary-button>APPROVE</x-primary-button>
    <x-primary-button class="ml-1" >REJECT</x-primary-button>
    </div>
</div>
</div>
</div>
</x-app-layout>

