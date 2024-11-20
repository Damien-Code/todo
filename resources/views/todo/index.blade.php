@extends('layouts.default')
@section('content')
    <div class="h-32 flex justify-between items-center ml-36">
{{--        Dropdown list van navigation.blade--}}
        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        <a href="{{route('todo.create')}}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-36 h-12">Create Todo +
            </button>
        </a>
    </div>
    <div class="grid xl:grid-cols-3 justify-items-center pb-12 h-screen gap-4 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
        @foreach($todos as $todo)
            <div class="p-6 w-80 h-48 bg-blue-200 content-center rounded-xl flex flex-col justify-between font-bold overflow-scroll">
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

