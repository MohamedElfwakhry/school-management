<form class="kt-form" enctype="multipart/form-data" action="{{route('grades.update')}}" method="get" >
    @csrf
    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first">
            <div class="form-group" style="display:none;">
                <input type="text" class="form-control" placeholder="{{__('category.arName')}}" name="id" value="{{$grade->id}}">

            </div>
            <div class="form-group">
                <label>{{__('category.arName')}}</label>
                <input type="text" class="form-control" placeholder="{{__('category.arName')}}" name="name_ar" value="{{$grade->name_ar}}">
                <span class="form-text text-muted">{{__('lang.arSpan')}}</span>
                @error('name_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>{{__('category.enName')}}</label>
                <input type="text" class="form-control" placeholder="{{__('category.enName')}}" name="name_en" value="{{$grade->name_en}}">
                <span class="form-text text-muted">{{__('lang.enSpan')}}</span>
            </div>
            <div class="form-group">
                <label>{{__('grade.notes')}}</label>
                <textarea type="text" class="form-control" placeholder="{{__('grade.notes')}}" name="notes" >{{$grade->notes}}</textarea>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
