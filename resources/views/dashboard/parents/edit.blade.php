
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
                    <form class="kt-form" enctype="multipart/form-data" action="{{route('parents.update')}}" method="POST">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group" style="display:none;">
                                <label>{{__('lang.email')}}</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="id" value="{{$parent->id}}">
                                <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="form-group">
                                <label>{{__('lang.email')}}</label>
                                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$parent->email}}">
                                <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">{{__('lang.password')}}</label>
                                        <input type="password" disabled class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="8sssss888">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">{{__('lang.password')}}</label>
                                        <button type="button" class="btn btn-primary change-password" style="display:flex;align-items:center;" href="#" data-toggle="modal" data-target="#exampleModalLong">Change Password</button>                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('lang.name')}}</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name" name="name" value="{{$parent->name}}">
                            </div>

                            <div class="form-group">
                                <label>{{__('category.photo')}}</label>
                                <input type="file" id="input-file-now-custom-1" class="dropify"  name="photo" data-default-file="{{$parent->photo}}">
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
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> {{__('grade.addGrade')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--begin::Form-->

                                <form class="kt-form" enctype="multipart/form-data" action="{{route('parents.changepassword')}}" method="POST" >
                                    @csrf
                                    <div class="kt-portlet__body">
                                        <div class="form-group" style="display:none;">
                                            <label>{{__('lang.email')}}</label>
                                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="id" value="{{$parent->id}}">
                                            <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                        </div>
                                        <div class="kt-section kt-section--first">

                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-sm">Change Or Recover Your Password:</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="password" class="form-control" name="oldPassword" placeholder="Current password">
                                                    <a href="#" class="kt-link kt-font-sm kt-font-bold kt-margin-t-5">Forgot password ?</a>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="password" class="form-control" name="password" placeholder="New password">
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Verify Password</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="password" class="form-control" name="repassword" placeholder="Verify password">
                                                </div>
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

@endsection
