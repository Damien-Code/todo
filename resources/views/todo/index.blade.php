<a href="{{route('todo.create')}}"><button>Create Todo</button></a>

<div>
   @foreach($todos as $todo)
        <p>{{$todo->title}}</p>
        <p>{{$todo->description}}</p>
       <form method="post" action="{{'todo.save'}}">
           <input type="checkbox" name="completed" value="0">
       </form>
       <a href="{{route('todo.show', $todo->id)}}"><button>Show</button></a>
   @endforeach
</div>

