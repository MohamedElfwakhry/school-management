@extends('layouts.dashboard')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.css' )}}">
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .center-cropped {
            width: 100px;
            height: 100px;
            background-position: center center;
            background-repeat: no-repeat;
            overflow: hidden;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        @include('dashboard.includes.alerts.errors')
        @include('dashboard.includes.alerts.success')
        <div class="row">
            <div class="col-md-12">

                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{__('lang.addTeacher')}}
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" enctype="multipart/form-data" action="{{route('teachers.store')}}" method="POST">
                        @csrf
                        <div class="kt-portlet__body">

                            <div class="form-group">
                                <label>{{__('lang.email')}}</label>
                                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                                <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('lang.password')}}</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('lang.name')}}</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name" name="name">
                            </div>

                            <div class="col-lg-12">

                                <label for="exampleSelect1">{{__('grade.grades')}}</label>
                                    @isset($grades)
                                        @foreach($grades as $grade)

                                        <div class="form-group">
                                            <label>{{$grade->name_en}}</label>
                                            <div class="kt-checkbox-inline">
                                                Classes:
                                                @foreach($grade->classroom as $classroom)

                                                    <label class="kt-checkbox">
                                                        <input type="checkbox" name="grades[]" value="{{$classroom->id}}">
                                                        {{$classroom->name}}
                                                        <span></span>
                                                    </label>

                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    @endisset
                            </div>

                            <div class="form-group">
                                <label>{{__('category.photo')}}</label>
                                <input type="file" id="input-file-now-custom-1" class="dropify"  name="photo" multiple>
                                <span class="form-text text-muted">{{__('category.enSpan')}}</span>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('assets/dropify/js/dropify.js' )}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-d??posez un fichier ici ou cliquez',
                    replace: 'Glissez-d??posez un fichier ou cliquez pour remplacer',
                    remove:  'Supprimer',
                    error:   'D??sol??, le fichier trop volumineux'
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
        $(".grade").on('keyup , click , change',function(){
            var id=$(this).val()
            /*
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            */
            $.ajax({
                type: "GET",
                url: "{{route('teachers.getClassroom')}}",
                data: {"id":id},
                success: function (data) {

                    $(".classroom").html(data);

                }
            })
        })
    </script>


@endsection
