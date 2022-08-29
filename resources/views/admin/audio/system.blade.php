<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Audios')

@section('mystyle')
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/vendors/css/tables/datatable/datatables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/pages/data-list-view.css') }}">
@endsection

@section('myscript')
<script src="{{ asset('admin_assets/vendors/js/extensions/dropzone.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
{{-- <script src="{{ asset('admin_assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script> --}}

<script src="{{ asset('admin_assets/js/scripts/components.js') }}"></script>

<script src="{{ asset('admin_assets/js/scripts/ui/data-list-view.js') }}"></script>
@endsection

@section('content')

<!-- Data list view starts -->
<section id="data-thumb-view" class="data-thumb-view-header">
    
    <!-- dataTable starts -->
    <div class="table-responsive">
        <table class="table data-thumb-view">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>TYPE</th>
                    <th>CREATED AT</th>
                    <th>PLAY</th>
                </tr>
            </thead>
            <tbody>
                @foreach($audios as $audio)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="product-name">{{ $audio->name }}</td>
                    <td class="product-name">{{ $audio->type }}</td>
                    <td class="product-price">{{ !is_null($audio->created_at) ? $audio->created_at->format('M j, Y H:ia') : "N/A" }}</td>
                    <td>
                        <figure>
                            <audio
                                controls
                                src="{{ asset('audio/system/'.$audio->name.'.mp3') }}">
                                    Your browser does not support the
                                    <code>audio</code> element.
                            </audio>
                        </figure>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    <!-- dataTable ends -->

    <!-- add new sidebar starts -->
    <div class="add-new-data-sidebar">
        <div class="overlay-bg"></div>
        <div class="add-new-data">
            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                <div>
                    <h4>ADD Audio to Music</h4>
                </div>
                <div class="hide-data-sidebar">
                    <i class="feather icon-x"></i>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.audio.save') }}" enctype="multipart/form-data">
                @csrf
            <div class="data-items pb-3">
                <div class="data-fields px-2 mt-3">
                    <div class="row">
                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">Type</label>
                            <select class="select2 form-control" name="type">
                                <option value="system">System</option>
                            </select>
                        </div>

                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">Category</label>
                            <select class="select2 form-control" name="sub_type">
                                <option value="main">Main</option>
                                <option value="team">Team</option>
                                <option value="end">End</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Upload Audio</label>
                                <input type="file" name="audio">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                <div class="add-data-btn">
                    <input type="submit" class="btn btn-primary" value="Add Audio">
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
<!-- Data list view end 

@endsection