@foreach($subCategories as $subCategory)
    <option value="{{$subCategory -> id}}">
        {{$subCategory -> name_ar}}
    </option>
@endforeach
