<link rel="stylesheet" href="{{asset('dashboard/dropify/dist/css/dropify.min.css')}}">

<form class="kt-form" enctype="multipart/form-data" action="{{route('update.product')}}" method="POST" >
    @csrf
    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first">
            <div class="form-group">
                <div class="dropdown">
                    Select Category:
                    <select name="category_id" class="select form-control" id="main_category1">
                        @foreach($categories as $category)
                            @if($category -> id != $product->category->id)
                                <option value="{{$category -> id }}">
                                    @if(LaravelLocalization::getCurrentLocale()=='en')
                                        {{$category -> name_en}}
                                    @else
                                        {{$category -> name_ar}}
                                    @endif
                                </option>
                            @endif
                        @endforeach
                        <option value="{{$product->category->id}}" selected="selected">
                            @if(LaravelLocalization::getCurrentLocale()=='en')
                                {{$product->category->name_en}}
                            @else
                                {{$product->category->name_ar}}
                            @endif
                        </option>
                    </select>

                    @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="dropdown">
                    Select Sub_category:
                    <select name="sub_category_id" class="select form-control" id="sub_category1">
                        <option value="{{$product->subCategories->id}}">
                            @if(LaravelLocalization::getCurrentLocale()=='en')
                                {{$product->subCategories->name_en}}
                            @else
                                {{$product->subCategories->name_ar}}
                            @endif
                        </option>
                    </select>

                    @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group" style="display:none;">
                <label>{{__('category.arName')}}</label>
                <input type="text" class="form-control" placeholder="{{__('category.arName')}}" name="id" value="{{$product->id}}">
                <span class="form-text text-muted">{{__('lang.arSpan')}}</span>
                @error('name_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group" >
                <label>{{__('category.arName')}}</label>
                <input type="text" class="form-control" placeholder="{{__('category.arName')}}" name="name_ar" value="{{$product->name_ar}}">
                <span class="form-text text-muted">{{__('lang.arSpan')}}</span>
                @error('name_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>{{__('category.enName')}}</label>
                <input type="text" class="form-control" placeholder="{{__('category.enName')}}" name="name_en" value="{{$product->name_en}}">
                <span class="form-text text-muted">{{__('lang.enSpan')}}</span>
            </div>
            <div class="form-group">
                <label>{{__('category.photo')}}</label>
                <input type="file" id="input-file-now-custom-1" class="dropify"  name="photo" data-default-file="{{$product->photo}}" >
                <span class="form-text text-muted">{{__('category.enSpan')}}</span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>


<script src="{{asset('assets/dropify/js/dropify.js' )}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>

<script>
    $("#main_category1").on('keyup , click , change',function(){
        var id=$(this).val()
        /*
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        */
        $.ajax({
            type: "GET",
            url: "{{url('admin/products/getsubcategory')}}",
            data: {"id":id},
            success: function (data) {

                $("#sub_category1").html(data);

            }
        })
    })
</script>
