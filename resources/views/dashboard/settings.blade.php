@extends('layouts.dashboard')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dropify/css/dropify.css' )}}">

@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" data-toggle="modal" data-target="#kt_modal_4">
        <div class="kt-portlet kt-portlet--mobile">
            @include('dashboard.includes.alerts.errors')
            @include('dashboard.includes.alerts.success')
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        General Settings
                    </h3>
                </div>


            </div>

            <!--begin::Modal-->

            <form class="kt-form" enctype="multipart/form-data" action="{{route('store.settings')}}" method="POST" >
                @csrf
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="form-group">
                            <label>{{__('category.arName')}}</label>
                            <input type="text" class="form-control" placeholder="{{__('category.arName')}}" value="{{$settings->name_ar}}" name="name_ar">
                            @error('name_ar')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{__('category.enName')}}</label>
                            <input type="text" class="form-control" placeholder="{{__('category.enName')}}" value="{{$settings->name_en}}" name="name_en">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.phone')}}</label>
                            <input type="text" class="form-control" placeholder="{{__('lang.phone')}}" value="{{$settings->phone}}" name="phone">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.email')}}</label>
                            <input type="text" class="form-control" placeholder="{{__('lang.email')}}" name="email" value="{{$settings->email}}" >
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.arAddress')}}</label>
                            <input type="text" class="form-control" placeholder="{{__('lang.arAddress')}}" value="{{$settings->address_ar}}"  name="address_ar">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.enAddress')}}</label>
                            <input type="text" class="form-control" placeholder="{{__('lang.enAddress')}}" value="{{$settings->address_en}}" name="address_en">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.facebook')}}</label>
                            <input type="text" class="form-control" placeholder="{{__('lang.facebook')}}" value="{{$settings->facebook}}" name="facebook" id="facebook" {{($settings->facebook_active == 1)?'':'disabled="disabled"'}}>
                            <span class="kt-switch kt-switch--primary">
                                <label>
                                    <input type="checkbox" {{($settings->facebook_active == 1)?'checked':''}} value="{{$settings->facebook_active}}" name="facebook_active" id="facebook_check" >
                                    <span></span>
                                </label>
                            </span>
                        </div>

                        <div class="form-group">
                            <label>{{__('lang.twitter')}}</label>
                            <input type="text" class="form-control" placeholder="{{__('lang.twitter')}}" name="twitter" id="twitter" value="{{$settings->twitter}}" {{($settings->twitter_active == 1)?'':'disabled="disabled"'}} >
                            <span class="kt-switch kt-switch--primary">
                                <label>
                                    <input type="checkbox" {{($settings->twitter_active == 1)?'checked':''}} value="{{$settings->twitter_active}}"  name="twitter_active" id="twitter_check" >
                                    <span></span>
                                </label>
                            </span>
                        </div>

                        <div class="form-group">
                            <label>{{__('category.photo')}}</label>
                            <input type="file" id="input-file-now-custom-1" class="dropify"  name="photo" >
                            <span class="form-text text-muted">{{__('category.enSpan')}}</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>



        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/dropify/js/dropify.js' )}}"></script>
    <script src="{{asset('assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
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
        $(function(){
            $('#facebook_check').on('click , change', function(){
                if($(this).is(':checked')){
                    $('#facebook').attr('disabled', false);
                } else {
                    $('#facebook').attr('disabled', true);
                }
            });

            $('#twitter_check').on('click , change', function(){
                if($(this).is(':checked')){
                    $('#twitter').attr('disabled', false);
                } else {
                    $('#twitter').attr('disabled', true);
                }
            });
        });
    </script>
@endsection
