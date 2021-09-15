<form class="kt-form" enctype="multipart/form-data" action="{{route('classrooms.update')}}" method="get" >
    @csrf
    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first">
            <div class="form-group" style="display:none;">
                <input type="text" class="form-control" placeholder="{{__('category.arName')}}" name="id" value="{{$classroom->id}}">

            </div>
            <div class="form-group">
                <div class="dropdown">
                    Select Grade:
                    <select name="grade_id" class="select form-control">
                        @foreach($grades as $grade)
                            @if($grade -> id != $classroom->grade->id)
                            <option value="{{$grade -> id }}">
                                @if(LaravelLocalization::getCurrentLocale()=='en')
                                    {{$grade -> name_en}}
                                @else
                                    {{$grade -> name_ar}}
                                @endif
                            </option>
                            @endif
                        @endforeach
                            <option value="{{$classroom->grade->id}}" selected="selected">
                                @if(LaravelLocalization::getCurrentLocale()=='en')
                                    {{$classroom->grade->name_en}}
                                @else
                                    {{$classroom->grade->name_ar}}
                                @endif
                            </option>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label>{{__('category.arName')}}</label>
                <input type="text" class="form-control" placeholder="{{__('category.arName')}}" name="name" value="{{$classroom->name}}">
                <span class="form-text text-muted">{{__('lang.arSpan')}}</span>
            </div>



        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
