@extends('layouts.dashboard')
@section('css')
    @if(LaravelLocalization::getCurrentLocale() =='en')
        <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

    @elseif(LaravelLocalization::getCurrentLocale() =='ar')
        <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    @endif

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
                        {{__('lang.teachers')}}
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
                            <a href="{{route('teachers.create')}}" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#exampleModalLong">
                                <i class="la la-plus"></i>
                                {{__('lang.addTeacher')}}
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
                                    <th title="Field #2">{{__('lang.address')}}</th>
                                    <th title="Field #3">{{__('lang.notes')}}</th>
                                    <th style="max-width:300px;" title="Field #3">{{__('lang.images')}}</th>
                                    <th title="Field #5">{{__('category.actions')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                        <tr class="data-row">
                                            <td scope="row">{{$blog -> id}}</td>
                                            <td class="name_ar">{{$blog->address}}</td>
                                            <td class="name_en">{{$blog->notes}}</td>

                                            <td class="name_en">@foreach($blog->blogImages as $image)<img width="100" height="100" src="{{$image->image}}">                                            @endforeach
                                            </td>
                                            <td>
                                                <a href="{{url('dashboard/classroom-blogs/edit/'.$blog->id)}}" class="btn btn-primary">
                                                    Edit
                                                    <i class="la la-edit"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <ul class="pagination justify-content-center">
                                {!! $blogs->links() !!}

                            </ul>

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
    <script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    //delete
    <script>
        $('#kt_tdata tbody').on( 'click', 'tr', function () {
            if (event.ctrlKey) {
                $(this).toggleClass('selected');
                @if(Request::segment(1) == 'en')
                $('#delete').text('Delete '+ table.rows('.selected').data().length +' row');
                @else
                $('#delete').text('حذف '+ table.rows('.selected').data().length +' سجل');
                @endif
            }else{
                var isselected = false
                var numSelected= table.rows('.selected').data().length
                if($(this).hasClass('selected') && numSelected==1){
                    isselected = true
                }
                $('#myTable tbody tr').removeClass('selected');
                if(!isselected){
                    $(this).toggleClass('selected');
                }
                @if(Request::segment(1) == 'en')
                $('#delete').text('Delete '+ table.rows('.selected').data().length +' row');
                @else
                $('#delete').text('حذف '+ table.rows('.selected').data().length +' سجل');
                @endif            }
        });
        //Delete Row
        $("body").on("click", "#delete", function () {
            var dataList=[];
            $("#kt_tdata .selected").each(function(index) {
                dataList.push($(this).find('td:first').text())
            })

            if(dataList.length >0){
                Swal.fire({
                    title: "{{__('lang.warrning')}}",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f64e60",
                    confirmButtonText: "{{__('lang.btn_yes')}}",
                    cancelButtonText: "{{__('lang.btn_no')}}",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function (result) {
                    if (result.value) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url:'{{route("grades.delete")}}',
                            type:"get",
                            data:{'id':dataList,_token: CSRF_TOKEN},
                            dataType:"JSON",
                            success: function (data) {
                                if(data.message == "Success")
                                {
                                    $("#kt_datatable .selected").hide();
                                    @if(session('lang') == 'ar')

                                    $('#delete').text('حذف 0 سجل');
                                    @else
                                    $('#delete').text('Delete 0 row');
                                    @endif
                                    Swal.fire("{{__('lang.Success')}}", "{{__('lang.Success_text')}}", "success");
                                    location.reload();
                                }else{
                                    Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.Message_Fail_Delete')}}", "error");
                                }
                            },
                            fail: function(xhrerrorThrown){
                                Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.Message_Fail_Delete')}}", "error");
                            }
                        });
                        // result.dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire("{{__('lang.Cancelled')}}", "{{__('lang.Message_Cancelled_Delete')}}", "error");
                    }
                });
            }
        });
    </script>
    <script>
        //DataTable
        var table = $('#kt_tdata').DataTable({
            dom: 'Bfrtip',
            "ordering":false,
            "paging":false,
            buttons: [
                'copy', 'excel', 'print'
            ],
            @if(session('lang') == 'ar')

            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            }
            @endif
        });
    </script>


@endsection
