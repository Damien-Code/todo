@extends('layouts.default')
@section('content')
<div class="h-screen flex justify-center items-center flex-col">
    <div class="h-24 w-80 flex justify-center items-center text-center">
        <p class="text-white text-4xl">{{$todo->id}}</p>
    </div>
    <div class="h-24 w-80 flex justify-center items-center text-center">
        <p class="text-white text-4xl">{{$todo->title}}</p>
    </div>
    <div class="h-24 w-80 flex justify-center items-center text-center">
        <p class="text-white text-4xl">{{$todo->description}}</p>
    </div>
    <div class="h-24 w-80 flex justify-center items-center text-center">
        <p class="text-white text-4xl">{{$todo->completed}}</p>
    </div>
    <div class="h-24 w-80 flex justify-center items-center text-center">
        <p class="text-white text-4xl">{{$todo->created_at}}</p>
    </div>
    <a href="{{route('todo.index')}}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full mb-5 m-16" >Back <-</button></a>
    <a href="{{route('todo.edit', $todo->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full"><button>Edit</button></a>
</div>
@endsection
