@extends('layouts.admin')

@section('stylesheet')
    <!-- DataTables -->
    <link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>


@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">List of Animal</h2>
                        </header>
                        <div class="panel-body">
                            @if(session()->has('status'))
                                {!! session()->get('status') !!}
                            @endif

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                                    <a href="{{ route('animal.create') }}" class="brn btn-success btn-sm">New animal</a>
                                </div>
                            </div>
                            {{--<table class="table table-bordered table-striped mb-none" id="data-table">--}}
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%" style="font-size: 14px">

                                <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th width="200">Created</th>
                                    <th width="50">Today Deal</th>
                                    <th width="50">Featured</th>
    
                                    <th width="50">Status</th>
                                    <th class="hidden-phone" width="40">Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $val)
                                    <tr class="@if(($key%2) == 0)gradeX @else gradeC @endif">
                                        <td class="p-1">{{ ($key+1) }}</td>
                                        <td class="p-1"><img src="{{ asset($val->image) }}" style="height: 50px;"></td>
                                        <td class="p-1">{{ $val->name }}</td>
                                        <td width="200" class="p-1">{{ date('F d, Y h:i A', strtotime($val->created_at)) }}</td>


                                        

                                        <td class="text-capitalize p-1" width="100">
                                            <div class="onoffswitchdeal">
                                                <input type="checkbox" name="onoffswitchdeal" class="onoffswitchdeal-checkbox"
                                                       @if($val->today_deal == \App\Models\Animal::$todayDealArrays[0])
                                                           checked
                                                       @endif
                                                       data-id="{{ $val->id }}"
                                                       id="myonoffswitchdeal{{ ($key+1) }}">
                                                <label class="onoffswitchdeal-label" for="myonoffswitchdeal{{ ($key+1) }}">
                                                    <span class="onoffswitchdeal-inner"></span>
                                                    <span class="onoffswitchdeal-switch"></span>
                                                </label>
                                            </div>
                                        </td>



                                        <td class="text-capitalize p-1" width="60">
                                            <div class="onoffswitchtwo">
                                                <input type="checkbox" name="onoffswitchtwo" class="onoffswitchtwo-checkbox"
                                                       @if($val->featured == \App\Models\Animal::$featuredArrays[0])
                                                           checked
                                                       @endif
                                                       data-id="{{ $val->id }}"
                                                       id="myonoffswitchtwo{{ ($key+1) }}">
                                                <label class="onoffswitchtwo-label" for="myonoffswitchtwo{{ ($key+1) }}">
                                                    <span class="onoffswitchtwo-inner"></span>
                                                    <span class="onoffswitchtwo-switch"></span>
                                                </label>
                                            </div>
                                        </td>


                                        





                                        <td class="text-capitalize p-1" width="100">
                                            <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                                       @if($val->status == \App\Models\Animal::$statusArrays[0])
                                                           checked
                                                       @endif
                                                       data-id="{{ $val->id }}"
                                                       id="myonoffswitch{{ ($key+1) }}">
                                                <label class="onoffswitch-label" for="myonoffswitch{{ ($key+1) }}">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </td>

                                        <td class="center hidden-phone p-1" width="100">
                                            <a href="{{ route('animal.manage', $val->id) }}" class="btn btn-sm btn-success"> <i class="fa fa-edit"></i> </a>
                                            <span class="btn btn-sm btn-danger btn-delete delete_{{ $val->id }}" style="cursor: pointer" data-id="{{ $val->id }}"><i class="fa fa-trash"></i></span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--              <div class="row">--}}
                            {{--                <div class="col-sm-12">{{ $data->links() }}</div>--}}
                            {{--              </div>--}}
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="userDeleteModal" tabindex="-1" role="dialog" aria-labelledby="userDeleteModal"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
{{--                    <h4>{{__('admin.animal.delete_user')}}</h4>--}}
                    <h4>Delete animal</h4>
                </div>
                <div class="modal-body">
                    <strong>Are You Sure Delete animal</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-success btn-sm yes-btn">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>



    <script>
        $(document).ready(function () {
            // $('#datatable-buttons').DataTable();

             var table = $('#datatable-buttons').DataTable({
               lengthChange: false,
               buttons: ['copy', 'excel', 'pdf', 'colvis']
             });

             table.buttons().container()
               .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');


            $(document).on('change', 'input[name="onoffswitch"]', function () {
                var status = 'inactive';
                var id = $(this).data('id')
                var isChecked = $(this).is(":checked");
                if (isChecked) {
                    status = 'active';
                }
                $.ajax({
                    url: "{{ route('ajax.update.animal.status') }}",
                    method: "post",
                    dataType: "html",
                    data: {'id': id, 'status': status},
                    success: function (data) {
                        if (data === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    }
                });
            });






            $(document).on('change', 'input[name="onoffswitchtwo"]', function () {
                var featured = 'no';
                var id = $(this).data('id')
                var isChecked = $(this).is(":checked");
                if (isChecked) {
                    featured = 'yes';
                }
                $.ajax({
                    url: "{{ route('ajax.update.animal.featured') }}",
                    method: "post",
                    dataType: "html",
                    data: {'id': id, 'featured': featured},
                    success: function (data) {
                        if (data === "success") {
                               Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    }
                });
            });



            $(document).on('change', 'input[name="onoffswitchdeal"]', function () {
                var today_deal = 'no';
                console.log(today_deal);
                var id = $(this).data('id')
                console.log("log2", id);
                var isChecked = $(this).is(":checked");
                console.log("log3", id);
                if (isChecked) {
                    today_deal = 'yes';
                }
                $.ajax({
                    url: "{{ route('ajax.update.animal.today_deal') }}",
                    method: "post",
                    dataType: "html",
                    data: {'id': id, 'today_deal': today_deal},
                    success: function (data) {
                        if (data === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                {{--  text: 'Updated successfully.',  --}}
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                        }
                    }
                });
            });


            




            $(document).on('click', '.yes-btn', function () {
                var pid = $(this).data('id');
                var $this = $('.delete_' + pid)
                $.ajax({
                    url: "{{ route('animal.destroy') }}",
                    method: "delete",
                    dataType: "html",
                    data: {id: pid},
                    success: function (data) {
                        if (data === "success") {
                            $('#userDeleteModal').modal('hide')
                            $this.closest('tr').css('background-color', 'red').fadeOut();
                        }
                    }
                });
            })

            $(document).on('click', '.btn-delete', function () {
                var pid = $(this).data('id');
                $('.yes-btn').data('id', pid);
                $('#userDeleteModal').modal('show')
            });
        })
    </script>
@endsection
