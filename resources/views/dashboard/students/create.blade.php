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
                    <form class="kt-form" enctype="multipart/form-data" action="{{route('students-classroom.store')}}" method="POST">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="kt-portlet__head-label">
                                    <h4 class="kt-portlet__head-title">
                                        {{__('lang.personalInformation')}}
                                    </h4>
                                </div>
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

                                <div class="form-group">
                                    <label>{{__('category.photo')}}</label>
                                    <input type="file" id="input-file-now-custom-1" class="dropify"  name="photo">
                                    <span class="form-text text-muted">{{__('category.enSpan')}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="kt-portlet__head-label">
                                    <h4 class="kt-portlet__head-title">
                                        {{__('lang.information')}}
                                    </h4>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1">{{__('grade.grades')}}</label>
                                    <select class="form-control" id="grade" name="grade_id">
                                        @isset($grades)
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->name_ar}}</option>

                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1">{{__('lang.classrooms')}}</label>
                                    <select class="form-control" id="classroom" name="classroom_id">

                                    </select>
                                </div>
                                @if(auth()->guard('parent')->check()!=null)
                                    <div class="form-group" style="display:none;">
                                        <input type="text" class="form-control" placeholder="{{__('category.arName')}}" name="parent_id" value="{{auth()->guard('parent')->user()->id}}">

                                    </div>
                                @endif
                                @isset($parents)

                                <div class="form-group">
                                    <label for="exampleSelect1">{{__('grade.grades')}}</label>
                                    <select class="form-control" name="parent_id">
                                            @foreach($parents as $grade)
                                                <option value="{{$grade->id}}">{{$grade->name}}</option>

                                            @endforeach
                                    </select>
                                </div>
                                @endisset

                            </div>
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
        $("#grade").on('keyup , click , change',function(){
            var id=$(this).val()
            /*
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            */
            $.ajax({
                type: "GET",
                url: "{{route('teachers.getClassroom')}}",
                data: {"id":id},
                success: function (data) {

                    $("#classroom").html(data);

                }
            })
        })
    </script>
@endsection
