@extends('layouts.app')

@section('content')

<div>
    @if (Auth::check() && Auth::user()->isAdmin)
    <button class="btn btn-primary">
        <a href="{{ route('createEvent') }}">
            <p>CREATE NEW EVENT</p>
        </a>
    </button>
    @endif
</div>

<div id="bodyCards">
            @foreach ($events as $event)

                <div class="max-w-sm rounded overflow-hidden shadow-lg" id="card">
                    <img src={{ $event->image }} alt="Sunset in the mountains" class="w-full">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $event->name }}</div>
                        <p class="text-gray-700 text-base">
                            {{ $event->description }}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <span class="block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $event->spaces }}</span> 
                    </div>
                    @if (Auth::check() && Auth::user()->isAdmin)
                    <form action="{{ route('delete', ['id' => $event->id]) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit"
                        class="bt-adm m-1 d-flex justify-content-center align-items-center"
                        onclick="return confirm('¿Estás seguro de querer eliminar este evento? {{$event->name}} -ID {{ $event -> id }}')">
                            🚮
                        </button>
                        <a class="bt-adm m-1 d-flex justify-content-center align-items-center"
                        href="{{ route('editEvent', ['id'=>$event->id]) }}">
                        📝
                        </a>
                        @endif
                        <a href="{{ route('showEvent', $event->id) }}">👀</a>
                    </form>
                    
                    <button class="text-warning"><a href="{{ route('inscribe', $event->id) }}">Inscribirme</a></button>

                    <button class="text-warning"><a href="{{ route('cancelInscription', $event->id) }}">Desinscribirme</a></button>
                    
                </div>
            @endforeach
        </div>

@endsection


