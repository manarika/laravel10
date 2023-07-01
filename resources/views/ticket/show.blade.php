<x-app-layout>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" >
    <h1 class="text-center">                {{$ticket->title}}
    </h1>
<div class="w-full sm:max-w-xl mt-6 px-6 shadow-md overflow-hidden " >

        <div class=" text-gray-100  flex justify-between  bg-white py-4 " >
            <p >
                {{$ticket->description}}
            </p>
            <p>
                {{$ticket->created_at->diffForHumans()}}
            </p>
            @if($ticket->attachment)
            <a href="{{"/storage/".$ticket->attachment}}" target="_blank">Attachment</a>
            @endif
                @if($ticket->reply)
                    <a href="{{route('ticket.reply',$ticket->id)}}" target="_blank">
                        <input type="button" >show reply</input>
                    </a>
                @endif
        </div>

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

            <form class="ml-1" action="{{route('ticket.reply',$ticket->id)}}" method="get">
            @csrf
            <x-primary-button>Reply</x-primary-button>
            </form>
        </div>
@if(auth()->user()->isAdmin)

    <div class="flex">
        <form action="{{route('ticket.update',$ticket->id)}}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="status" value="resolved"/>
            <x-primary-button>APPROVE</x-primary-button>
            <input type="hidden" name="status" value="resolved"/>
            <x-primary-button class="ml-1" >REJECT</x-primary-button>

        @else
            <p > Status: {{$ticket->status}}</p>
            @endif

        </form>


    </div>

</div>
</div>
</div>
</x-app-layout>

