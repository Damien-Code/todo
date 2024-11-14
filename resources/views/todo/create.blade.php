<div>
    <form method="post" action="{{route('todo.store')}}">
        @csrf

        <label for="title">Your Todo</label>
        <input type="text" id="title" name="title">
        <label for="description">What?</label>
        <input type="text" id="description" name="description">
        <button type="submit">Save</button>
    </form>
</div>
