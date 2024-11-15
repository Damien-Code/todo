@extends('layouts.default')
@section('content')
<div class="h-screen flex justify-center items-center flex-col">
    <p class="text-white text-4xl">{{$todo->id}}</p>
    <p class="text-white text-4xl">{{$todo->title}}</p>
    <p class="text-white text-4xl">{{$todo->description}}</p>
    <p class="text-white text-4xl">{{$todo->completed}}</p>
    <p class="text-white text-4xl">{{$todo->created_at}}</p>
    <a href="{{route('todo.index')}}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full mb-5" >Back <-</button></a>
    <a href="{{route('todo.edit', $todo->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full"><button>Edit</button></a>
</div>
@endsection
