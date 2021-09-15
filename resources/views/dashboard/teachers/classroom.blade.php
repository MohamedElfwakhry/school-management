@foreach($classrooms as $classroom)
    <option value="{{$classroom->id}}">{{$classroom->name}}</option>

@endforeach
