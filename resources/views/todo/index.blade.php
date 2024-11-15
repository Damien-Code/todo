@extends('layouts.default')
@section('content')
<a href="{{route('todo.create')}}">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Create Todo</button>
</a>

<div>
    @foreach($todos as $todo)
        <div class="p-6 w-60 border-solid border-gray-300 border-2">
            <p>{{$todo->title}}</p>
            <p>{{$todo->description}}</p>
            <form method="post" action="{{route('todo.updateTodo', $todo->id)}}">
                @method('PUT')
                @csrf
                <input type="checkbox" name="completed" onclick="event.preventDefault(); this.closest('form').submit();"
                       @if($todo->completed) checked @endif value="{{old('completed', $todo->completed)}}">
            </form>
            <a href="{{route('todo.show', $todo->id)}}">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Show</button>
            </a>
        </div>
    @endforeach
</div>
@endsection

