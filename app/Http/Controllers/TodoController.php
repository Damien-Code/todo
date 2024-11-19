<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $todos = todo::all();
        $userid = Auth::user()->id;
        $todos = Todo::where('id', $userid)->get();
        return view('todo.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:150',
            'description' => 'required|max:200',
            'completed' => 'boolean',
        ]);
        todo::create($validatedData);
        return(redirect('todo'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('todo.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
       $validatedData = $request->validate([
           'title' => 'required|max:150',
           'description' => 'required|max:200',
           'completed' => 'boolean',
       ]);
       $todo->update($validatedData);
       return redirect(route('todo.index'));
    }

    public function updateTodo(Request $request, Todo $todo)
    {
        $todo->update([
            'completed' => $request->has('completed'),
        ]);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todo.index'));
    }
}
