<form class="kt-form" enctype="multipart/form-data" action="{{route('subjects.update')}}" method="POST" >
    @csrf
    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first">

            <div id="kt_repeater_1">
                <div class="form-group form-group-last row" id="kt_repeater_1">
                    <div class="col-lg-12">
                        <div class="form-group row align-items-center">
                            <div class="form-group" style="display:none;">
                                <input type="text" class="form-control" placeholder="{{__('category.arName')}}" name="id" value="{{$subject->id}}">

                            </div>

                            <div class="col-md-6">
                                <div class="kt-form__group--inline">
                                    <div class="kt-form__label">
                                        <label>Name:</label>
                                    </div>
                                    <div class="kt-form__control">
                                        <input type="text" class="form-control" placeholder="Enter full name" name="name" value="{{$subject->name}}">
                                    </div>
                                </div>
                                <div class="d-md-none kt-margin-b-10"></div>
                            </div>

                            <div class="col-md-6">
                                <label>{{__('grade.grades')}}</label>
                                <div class="kt-checkbox-inline">
                                    @foreach($grades as $grade)
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="grades[]" value="{{$grade->id}}"
                                                           @foreach($subject->grade as $gradee)
                                                           @if($grade->id == $gradee->id)
                                                           checked
                                                           @endif
                                                           @endforeach
                                                           >
                                                    {{$grade->name_ar}}
                                                    <span></span>
                                                </label>

                                    @endforeach
                                </div>
                                <span class="form-text text-muted">{{__('lang.gradesWithSubject')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
