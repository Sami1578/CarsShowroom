@extends('layouts.app')

@section('content')

<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">
            Cars Showroom
        </h1>
    </div>
    @if(Auth::user())
        <div class="pt-10">
            <a 
            href="/cars/create"
            class="border-b-2 pb-2 border-dotted italic text-gray-500"
            >
                Add a new Car &rarr;
            </a>
        </div>
        @else
        <p class="py-12 italic">
            Please Login to add a new car.
        </p>
    @endif

    <div class="w-5/6 py-10">
        @foreach($cars as $car)

        <div class="m-auto">
            @if(isset(Auth::user()->id) && Auth::user()->id == $car->user_id)
            <div class="float-right">
                <a 
                href="cars/{{ $car->id }}/edit"
                class="border-b-2 pb-2 border-dotted italic text-green-500"
                >
                    Edit Car &rarr;
                </a>
                <form 
                action="/cars/{{ $car->id }}"
                method="POST"
                >
                    @csrf
                    @method('delete')
                    <button
                    type="submit"
                    class="border-b-2 pb-2 mt-2 border-dotted italic text-red-500"
                    >
                        Delete Car &rarr;
                    </button>
                </form>
            </div>
            @endif
            <span class="uppercase text-blue-500 font-bold text-xs italic">
                Founded : {{ $car->founded }}
            </span>
            <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                <a href="/cars/{{ $car->id }}">{{ $car->name }}</a>
            </h2>
            <p class="text-lg text-gray-700">
                {{ $car->description }}
            </p>
            <hr class="mt-4 mb-8">
        </div>

        @endforeach
    </div>
</div>

@endsection
