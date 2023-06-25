@extends('layouts.master')

@section('title')
    @lang('translation.Projects_List')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Projects
        @endslot
        @slot('title')
            Projects List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm">
                            <div class="search-box me-2 d-inline-block">
                                <div class="position-relative">
                                    <input type="text" class="form-control" autocomplete="off" id="searchTableList"
                                        placeholder="Search...">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-auto">
                            <div class="text-sm-end">
                                <a href="projects-create" class="btn btn-success btn-rounded" id="addProject-btn"><i
                                        class="mdi mdi-plus me-1"></i> Add New Project</a>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="">
                        <div class="table-responsive">
                            <table
                                class="table project-list-table align-middle table-nowrap dt-responsive nowrap w-100 table-borderless"
                                id="projectList-table">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 60px">#</th>
                                        <th scope="col">Projects</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Team</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->

    <!-- Modal -->
    <div class="modal fade" id="removeItemModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body px-4 py-5 text-center">
                    <button type="button" class="btn-close position-absolute end-0 top-0 m-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="avatar-sm mb-4 mx-auto">
                        <div class="avatar-title bg-primary text-primary bg-opacity-10 font-size-20 rounded-3">
                            <i class="mdi mdi-trash-can-outline"></i>
                        </div>
                    </div>
                    <p class="text-muted font-size-16 mb-4">Are you Sure You want to Remove this Order ?</p>

                    <div class="hstack gap-2 justify-content-center mb-0">
                        <button type="button" class="btn btn-danger" id="remove-item">Remove Now</button>
                        <button type="button" class="btn btn-secondary" id="close-removeProjectModal"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end removeItemModal -->
@endsection

@section('css')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/project-list.init.js') }}"></script>
@endsection
