@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

<div>
    <a href="{{ route('createEvent') }}">
        <p>CREATE NEW EVENT</p>
    </a>
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
                    <form action="{{ route('delete', ['id' => $event->id]) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit"
                        class="bt-adm m-1 d-flex justify-content-center align-items-center"
                        onclick="return confirm('¿Estás seguro de querer eliminar este evento? {{$event->name}} -ID {{ $event -> id }}')">
                            <img class="ico-adm"
                            src="{{ url('https://cdn-icons-png.flaticon.com/128/2371/2371924.png') }}" >
                        </button>
                    </form>
                    
                </div>
            @endforeach
        </div>

@endsection


