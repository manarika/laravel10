<x-app-layout>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" >
   <div>
       <h1 class="text-center">Support Tickets</h1>
<div>
    <a href="{{route('ticket.create')}}">create new ticket</a>
</div>
   </div>

<div class="w-full sm:max-w-xl mt-6 px-6 shadow-md overflow-hidden " >
    @forelse($tickets as $ticket)
        <div class=" text-gray-100  flex justify-between  bg-white py-4
        " >
            <a href="{{route('ticket.show',$ticket->id)}}" class="rounded-lg p-2">
                {{$ticket->title}}
            </a>
            {{$ticket->created_at->diffForHumans()}}
            <p>

            </p>
        </div>
    @empty
        <p>you don't have any support ticket yet</p>
    @endforelse

</div>
</div>

</x-app-layout>

