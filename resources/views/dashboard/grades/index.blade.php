@extends('layouts.dashboard')
@section('css')
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
                        {{__('lang.sliders')}}
                        <small>Datatable initialized from HTML table</small>
                    </h3>
                </div>

                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            {{--<button type="button" class="btn btn-primary" aria-label="Left Align" style="margin-bottom:20px;" data-toggle="modal" data-target="#exampleModalLong" >
                                <span class="fa-stack fa" style="color:white;"><i class="fas fa-plus"></i></span>
                                {{__('sidebar.newCategory')}}
                            </button>--}}
                            <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#exampleModalLong">
                                <i class="la la-plus"></i>
                                {{__('lang.createSlider')}}
                            </a>
                            <button id="delete" class="btn btn-danger font-weight-bolder">
                                <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                    <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
                                  </g>
                                         </svg><!--end::Svg Icon-->
                                </span>
                                {{__('lang.Delete')}}</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Modal-->

            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"> {{__('lang.createSlider')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--begin::Form-->

                            <form class="kt-form" enctype="multipart/form-data" action="" method="POST" >
                                @csrf
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="form-group">
                                            <div class="dropdown">
                                                Select Category:
                                                <select name="category_id" class="select form-control" id="main_category">
                                                    @isset($categories)
                                                    @foreach($categories as $category)
                                                        <option value="{{$category -> id }}">
                                                            {{$category -> name_en}}
                                                        </option>
                                                    @endforeach
                                                    @endisset
                                                </select>

                                                @error('category_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>{{__('category.arName')}}</label>
                                            <input type="text" class="form-control" placeholder="{{__('category.arName')}}" name="name_ar">
                                            <span class="form-text text-muted">{{__('lang.arSpan')}}</span>
                                            @error('name_ar')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>{{__('category.enName')}}</label>
                                            <input type="text" class="form-control" placeholder="{{__('category.enName')}}" name="name_en">
                                            <span class="form-text text-muted">{{__('lang.enSpan')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('category.photo')}}</label>
                                            <input type="file" id="input-file-now-custom-1" class="dropify"  name="photo" >
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

            <div class="modal fade modal-edit" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                        </div>

                    </div>
                </div>
            </div>

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__body">

                    <!--begin::Section-->
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <table class="table table-bordered table-hover" id=kt_tdata>
                                <thead>
                                <tr>
                                    <th title="Field #1">#</th>
                                    <th title="Field #2">{{__('category.arName')}}</th>
                                    <th title="Field #3">{{__('category.enName')}}</th>
                                    <th title="Field #4">{{__('category.photo')}}</th>
                                    <th title="Field #5">{{__('category.actions')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @isset($products)
                                    @foreach($sliders as $category)
                                        <tr class="data-row">
                                            <td scope="row">{{$category -> id}}</td>
                                            <td class="name_ar">{{$category->name_ar}}</td>
                                            <td class="name_en">{{$category->name_en}}</td>
                                            <td><img class="center-cropped" src="{{$category->photo}}" width="100" height="100" alt="Girl in a jacket" ></td>
                                            <td>
                                                <button type="button" class="btn btn-primary edit-product"
                                                        data-id="{{$category -> id}}">
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

                    <!--end::Section-->
                </div>

                <!--end::Form-->
            </div>

        </div>
    </div>

@endsection

@section('js')
@endsection
