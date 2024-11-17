@extends('layouts.default')
@section('content')
    <div class="h-32 flex justify-end items-center p-12">
        <a href="{{route('todo.create')}}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Create Todo +
            </button>
        </a>
    </div>
    <div class="grid xl:grid-cols-3 justify-items-center pb-12 h-screen gap-4 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
        @foreach($todos as $todo)
            <div class="p-6 w-80 h-48 bg-blue-200 content-center rounded-xl flex flex-col justify-between font-bold">
                @switch($todo->completed)
                    @case('1')
                        <p class="line-through text-gray-400 text-xl">{{$todo->title}}</p>
                        <p class="line-through text-gray-400 text-xl">{{$todo->description}}</p>
                        @break
                    @case('0')
                        <p class="text-xl">{{$todo->title}}</p>
                        <p class="text-xl">{{$todo->description}}</p>
                        @break
                @endswitch
                <form method="post" action="{{route('todo.updateTodo', $todo->id)}}">
                    @method('PUT')
                    @csrf
                    <input type="checkbox" name="completed"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           @if($todo->completed) checked @endif value="{{old('completed', $todo->completed)}}">
                </form>
                <div class="flex justify-between">
                    <a href="{{route('todo.show', $todo->id)}}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full">Show
                        </button>
                    </a>
                    <form method="post" action="{{route('todo.destroy', $todo->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-900 text-white font-bold py-1 px-2 rounded-full">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection

