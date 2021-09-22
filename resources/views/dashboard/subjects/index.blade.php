@extends('layouts.dashboard')
@section('css')
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

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
                        {{__('lang.subjects')}}
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
                                {{__('lang.addSubject')}}
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
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"> {{__('lang.addSubject')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--begin::Form-->

                            <form class="kt-form" enctype="multipart/form-data" action="{{route('subjects.store')}}" method="POST" >
                                @csrf
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">

                                        <div id="kt_repeater_1">
                                            <div class="form-group form-group-last row" id="kt_repeater_1">
                                                <div class="col-lg-12">
                                                    <div class="form-group row align-items-center">


                                                        <div class="col-md-6">
                                                            <div class="kt-form__group--inline">
                                                                <div class="kt-form__label">
                                                                    <label>Name:</label>
                                                                </div>
                                                                <div class="kt-form__control">
                                                                    <input type="text" class="form-control" placeholder="Enter full name" name="name">
                                                                </div>
                                                            </div>
                                                            <div class="d-md-none kt-margin-b-10"></div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>{{__('grade.grades')}}</label>
                                                            <div class="kt-checkbox-inline">
                                                                @foreach($grades as $grade)

                                                                <label class="kt-checkbox">
                                                                    <input type="checkbox" name="grades[]" value="{{$grade->id}}">
                                                                    {{$grade->name_ar}}
                                                                    <span></span>
                                                                </label>

                                                                @endforeach
                                                            </div>
                                                            <span class="form-text text-muted">{{__('lang.gradesWithSubject')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
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
                                    <th title="Field #3">{{__('grade.grades')}}</th>
                                    <th title="Field #5">{{__('category.actions')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @isset($subjects)
                                    @foreach($subjects as $subject)
                                        <tr class="data-row">
                                            <td scope="row">{{$subject -> id}}</td>
                                            <td class="name_ar">{{$subject->name}}</td>
                                            <td class="name_en">
                                                @foreach($subject->grade as $grade)
                                                    <h6 class="kt-font-brand">{{$grade->name_ar}}</h6>
                                                @endforeach
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary edit-product"
                                                        data-id="{{$subject -> id}}">
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
    <script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script src="{{asset('assets/js/demo1/pages/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>

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
                            url:'{{route("subjects.delete")}}',
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

    //edit
    <script>
        $(".edit-product").click(function(){
            var id=$(this).data('id')
            /*
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            */
            $.ajax({
                type: "GET",
                url: "{{route('subjects.edit')}}",
                data: {"id":id},
                success: function (data) {
                    $(".modal-edit .modal-body").html(data)
                    $(".modal-edit").modal('show')
                    $(".modal-edit").on('hidden.bs.modal',function (e){
                        //   $('.bs-edit-modal-lg').empty();
                        $('.modal-edit').hide();
                    })
                }
            })
        })
    </script>
@endsection
