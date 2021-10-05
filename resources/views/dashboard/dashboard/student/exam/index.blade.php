@extends('layouts.dashboard')
@section('css')
@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        @isset($exams)
            @foreach($exams as $exam)
        <div class="row">
            <div class="col-xl-3">

        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--noborder">

            </div>
            <div class="kt-portlet__body">

                <!--begin::Widget -->
                <div class="kt-widget kt-widget--user-profile-2">
                    <div class="kt-widget__head">

                        <div class="kt-widget__info">
                            <a href="#" class="kt-widget__titel kt-hidden-">
                                {{$exam->name}}
                            </a>
                            <a href="#" class="kt-widget__username kt-hidden">
                                Luca Doncic
                            </a>
                            <span class="kt-widget__desc">
                                                                {{$exam->teacher->name}}
                                                            </span>
                        </div>
                    </div>
                    <div class="kt-widget__body">

                        <div class="kt-widget__item">
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Points:</span>
                                <a href="#" class="kt-widget__data">{{$exam->points}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-widget__footer">
                        <a type="button" href="{{route('enter.exam',$exam->id)}}" class="btn btn-label-warning btn-lg btn-upper">view project</a>
                    </div>
                </div>

                <!--end::Widget -->
            </div>
        </div>

            </div>
        </div>
            @endforeach
        @endisset
        <!--begin::Portlet-->
            <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
                <div class="kt-portlet__head" >
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Portlet Title
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar" >
                        <div class="kt-portlet__head-group">
                            <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-clean btn-icon-md"><i class="la la-angle-down"></i></a>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-portlet__content">
                        <!--begin::Section-->
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <table class="table table-bordered table-hover" id=kt_tdata>
                                    <thead>
                                    <tr>
                                        <th title="Field #1">#</th>
                                        <th title="Field #2">{{__('lang.email')}}</th>
                                        <th title="Field #3">{{__('lang.name')}}</th>
                                        <th title="Field #5">{{__('category.actions')}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @isset($parents)
                                        @foreach($parents as $parent)
                                            <tr class="data-row">
                                                <td scope="row">{{$parent -> id}}</td>
                                                <td class="name_ar">{{$parent->email}}</td>
                                                <td class="name_en">{{$parent->name}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary edit-product"
                                                            data-id="{{$parent -> id}}">
                                                        Edit
                                                        <i class="la la-edit"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('js')
@endsection
