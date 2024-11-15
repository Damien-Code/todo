@extends('layouts.default')
@section('content')
<div class="bg-gray-800 h-screen flex justify-center items-center">
    <form method="post" action="{{route('todo.store')}}">
        @csrf
        <label for="title" class="text-white">Your Todo</label>
        <input type="text" id="title" name="title">
        <label for="description" class="text-white">What?</label>
        <input type="text" id="description" name="description">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Save</button>
    </form>
</div>
@endsection
