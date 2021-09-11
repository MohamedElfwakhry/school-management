<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> {{__('sidebar.newCategory')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->

                <form class="kt-form" enctype="multipart/form-data" action="{{route('new.category')}}" method="POST" >
                    @csrf
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>{{__('category.arName')}}</label>
                                <input type="text" class="form-control" placeholder="{{__('category.arName')}}" name="name_ar">
                                <span class="form-text text-muted">{{__('category.arSpan')}}</span>
                                @error('name_ar')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__('category.enName')}}</label>
                                <input type="text" class="form-control" placeholder="{{__('category.enName')}}" name="name_en">
                                <span class="form-text text-muted">{{__('category.enSpan')}}</span>
                            </div>
                            <div class="form-group">
                                <label>{{__('category.photo')}}</label>
                                <input type="file" id="input-file-now-custom-1" class="dropify"  name="photo">
                                <span class="form-text text-muted">{{__('category.enSpan')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
