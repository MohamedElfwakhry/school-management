@foreach($classrooms as $grade)

    <label class="kt-checkbox">
        <input type="checkbox" name="grades[]" value="{{$grade->id}}">
        {{$grade->name}}
        <span></span>
    </label>

@endforeach
