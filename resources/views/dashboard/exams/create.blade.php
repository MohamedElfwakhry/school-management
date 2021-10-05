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
                    <form class="kt-form" enctype="multipart/form-data" action="{{route('exams.store')}}" method="POST">
                        @csrf
                        <div class="kt-portlet__body">

                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('exam.question')}}</label>
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('exam.time')}}</label>
                                <input type="number" class="form-control" placeholder="Time" name="time">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleSelect1">{{__('exam.subjects')}}</label>
                                        <select class="form-control" id="grade" name="subject_id">
                                            @isset($subjects)
                                                @foreach($subjects as $grade)
                                                    <option value="{{$grade->id}}">{{$grade->name}}</option>

                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>

                            @isset($teachers)
                                <div class="form-group">
                                    <label for="exampleSelect1">{{__('lang.teachers')}}</label>
                                    <select class="form-control" name="teacher_id">
                                        @foreach($teachers as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            @endisset
                            <div class="col-md-12" style="
                                                                            padding-bottom: 10px;" >
                                <div class="kt-form__group--inline">
                                    <div class="kt-form__label">
                                        <label class="kt-label m-label--single">{{__('exam.answer3')}}</label>
                                    </div>
                                    <div class="kt-form__control">
                                        <input type="number" class="form-control" placeholder="{{__('exam.answer1')}}" name="points">
                                    </div>
                                </div>
                                <div class="d-md-none kt-margin-b-10"></div>
                            </div>
                            <div class="kt-section kt-section--first">

                                <div id="kt_repeater_1">
                                    <div class="form-group form-group-last row" id="kt_repeater_1">
                                        <div data-repeater-list="List_Classes" class="col-lg-12">
                                            <div data-repeater-item class="form-group row align-items-center">


                                                <div class="col-md-12" style="margin-bottom:20px;">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__label">
                                                            <label>{{__('exam.question')}}</label>
                                                        </div>
                                                        <div class="kt-form__control">
                                                            <input type="text" class="form-control" placeholder="{{__('exam.name')}}" name="question">
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="col-md-12" style="  padding-right: 30px;
                                                                            padding-left: 30px;
                                                                            padding-bottom: 10px;">

                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__label">
                                                                <label class="kt-label m-label--single">{{__('exam.answer1')}}</label>
                                                            </div>
                                                            <div class="kt-form__control">
                                                                <input type="text" class="form-control" placeholder="{{__('exam.answer')}}" name="answer1">
                                                            </div>
                                                        </div>
                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                    </div>
                                                    <div class="col-md-12" style="  padding-right: 30px;
                                                                            padding-left: 30px;
                                                                            padding-bottom: 10px;">
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__label">
                                                                <label>{{__('exam.answer2')}}</label>
                                                            </div>
                                                            <div class="kt-form__control">
                                                                <input type="text" class="form-control" placeholder="{{__('exam.answer')}}" name="answer2">
                                                            </div>
                                                        </div>
                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                    </div>


                                                    <div class="col-md-12" style="  padding-right: 30px;
                                                                            padding-left: 30px;
                                                                            padding-bottom: 10px;">
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__label">
                                                                <label class="kt-label m-label--single">{{__('exam.answer3')}}</label>
                                                            </div>
                                                            <div class="kt-form__control">
                                                                <input type="text" class="form-control" placeholder="{{__('exam.answer1')}}" name="answer3">
                                                            </div>
                                                        </div>
                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                    </div>
                                                    <div class="col-md-12" style="  padding-right: 30px;
                                                                            padding-left: 30px;
                                                                            padding-bottom: 10px;">
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__label">
                                                                <label class="kt-label m-label--single">{{__('exam.answer4')}}</label>
                                                            </div>
                                                            <div class="kt-form__control">
                                                                <input type="text" class="form-control" placeholder="{{__('exam.answer1')}}" name="answer4">
                                                            </div>
                                                        </div>
                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                    </div>
                                                </div>



                                                <div class="col-md-3">
                                                    <div class="col-md-12" style="
                                                                            padding-bottom: 10px;">
                                                        <label for="exampleSelect1">Right Answer</label>
                                                        <select class="form-control" name="right_answer" required>
                                                            <option value="">Select Right answer ..</option>

                                                            <option value="answer1">Answer 1</option>
                                                            <option value="answer2">Answer 2</option>
                                                            <option value="answer3">Answer 3</option>
                                                            <option value="answer4">Answer 4</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-12" style="
                                                                            padding-bottom: 10px;" >
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__label">
                                                                <label class="kt-label m-label--single">{{__('exam.answer3')}}</label>
                                                            </div>
                                                            <div class="kt-form__control">
                                                                <input type="number" class="form-control" placeholder="{{__('exam.answer1')}}" name="points">
                                                            </div>
                                                        </div>
                                                        <div class="d-md-none kt-margin-b-10"></div>
                                                    </div>
                                                    <div class="col-md-12 m-grid-col-center" style=" text-align: center;">
                                                        <a href="javascript:;" data-repeater-delete class="btn-sm btn btn-label-danger btn-bold">
                                                            <i class="la la-trash-o"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-last row " style=" text-align: center;">
                                        <label class="col-lg-2 col-form-label"></label>
                                        <div class="col-lg-4">
                                            <a href="javascript:;" data-repeater-create class="btn btn-bold btn-sm btn-label-brand">
                                                <i class="la la-plus"></i> Add
                                            </a>
                                        </div>
                                    </div>
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
    <script src="{{asset('assets/js/demo1/pages/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>

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
