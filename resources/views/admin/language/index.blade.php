<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'All Languages')

@section('mystyle')
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/vendors/css/tables/datatable/datatables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/pages/data-list-view.css') }}">
@endsection

@section('myscript')
<script src="{{ asset('admin_assets/vendors/js/extensions/dropzone.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/scripts/components.js') }}"></script>

<script src="{{ asset('admin_assets/js/scripts/ui/data-list-view.js') }}"></script>
@endsection

@section('content')

<!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Archive</a>
                                    <a class="dropdown-item" href="#">Print</a>
                                    <a class="dropdown-item" href="#">Another Action</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>CODE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($languages as $language)
                                <tr>
                                    <td class="product-name"><a href="#">{{ $language->name }}</a></td>
                                    <td class="product-name"><a href="#">{{ $language->code }}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->

                    <!-- add new sidebar starts -->
                                    <div class="add-new-data-sidebar">
                                        <div class="overlay-bg"></div>
                                        <div class="add-new-data">
                                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                <div>
                                                    <h4>ADD NEW LANGUAGE</h4>
                                                </div>
                                                <div class="hide-data-sidebar">
                                                    <i class="feather icon-x"></i>
                                                </div>
                                            </div>
                                            <form method="POST" action="{{ route('admin.language.store') }}">
                                                @csrf
                                            <div class="data-items pb-3">
                                                <div class="data-fields px-2 mt-3">
                                                    <div class="row">
                                                        <div class="col-sm-12 data-field-col">
                                                            <label for="data-name">Name</label>
                                                            <input type="text" class="form-control" name="name" id="data-name">
                                                        </div>
                                                        <div class="col-sm-6 data-field-col">
                                                            <label for="data-name">Code</label>
                                                            <input type="text" class="form-control" name="code" id="data-name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                <div class="add-data-btn">
                                                    <input type="submit" class="btn btn-primary" value="Add Language">
                                                </div>
                                            </form>
                                                <div class="cancel-data-btn">
                                                    <button class="btn btn-outline-danger">Cancel</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- add new sidebar ends -->

                </section>
                <!-- Data list view end -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Currency</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-vertical" action="{{ route('admin.currency.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Name</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="name" placeholder="Currency Name" readonly="">
                                </div>
                            </div>
                            <input type="hidden" name="currency_id">
                            <input type="hidden" name="status">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Symbol</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="symbol" placeholder="Symbol" readonly="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Usd Rate</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="usdrate" placeholder="Usd Rate" readonly="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Color</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="color" placeholder="Color" readonly="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Min</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="min" placeholder="Min">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Max</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="max" placeholder="Min">
                                </div>
                            </div>
                            <input type="hidden" name="is_fiat">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="data-name">Is Fiat</label>
                                    <select name="is_fiat" class="form-control" disabled="">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
            </div> --}}
        </div>
    </div>
</div>
@endsection