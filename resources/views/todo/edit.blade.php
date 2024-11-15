@extends('layouts.default')
@section('content')
    <div>
        <form method="post" action="{{route('todo.update', $todo->id)}}">
            @csrf
            @method('PATCH')
            <label for="title" class="text-white">Your Todo</label>
            <input type="text" id="title" name="title" value="{{$todo->title}}">
            <label for="description" class="text-white">What?</label>
            <input type="text" id="description" name="description" value="{{$todo->description}}">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Update
            </button>
        </form>
    </div>
@endsection
