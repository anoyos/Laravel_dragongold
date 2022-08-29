<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'All News')

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

<script type="text/javascript">

        $(document).ready(function () {
           
            $(".editBtn").click(function (e) {
                e.preventDefault();
                try{
                    var d = $(this).data('all');

                    $("#editModal [name='news_id']").val(d.id);
                    $("#editModal [name='title']").val(d.title);
                    $("#editModal [name='body']").val(d.body);
                    
                    
                    $("#editModal").modal('show');
                }
                catch(err){
                    alert(err);
                }
            });

        });//end ready

    </script> 
@endsection

@section('content')

<!-- Nav Justified Starts -->
<section id="nav-justified">
    <div class="row">
        <div class="col-sm-12">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h4 class="card-title">News</h4>
                </div>
                
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                            @foreach($languages as $language)
                            <li class="nav-item">
                                <a class="nav-link {{ $current == $language->name ? "active" : "" }}" id="{{ $language->code }}-tab-justified" data-toggle="tab" href="#{{ $language->code }}-just" role="tab" aria-controls="{{ $language->code }}-just" aria-selected="{{ $current == "English" ? "true" : "false" }}">{{ $language->name }}</a>
                            </li>
                            @endforeach
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content pt-1">
                            @foreach($languages as $language)
                            <div class="tab-pane {{ $current == $language->name ? "active" : "" }}" id="{{ $language->code }}-just" role="tabpanel" aria-labelledby="{{ $language->code }}-tab-justified">
                                
                                <!-- Data list view starts -->
                                <section id="data-thumb-view" class="data-thumb-view-header">
                                    
                                    <!-- dataTable starts -->
                                    <div class="table-responsive">
                                        <table class="table data-thumb-view">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>TITLE</th>
                                                    <th>BODY</th>
                                                    <th>CREATED AT</th>
                                                    <TH>UPDATED AT</TH>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($language->news as $new)
                                                <tr>
                                                    <td class="product-img"><img src="{{ asset('news/'.$new->image) }}" alt="Img placeholder">
                                                    </td>
                                                    <td class="product-name">{{ $new->title }}</td>
                                                    <td class="product-category">{{ substr($new->body, 0, 50) }}{{ strlen($new->body) > 50 ? "..." : "" }}</td>
                                                    
                                                    <td class="product-price">{{ $new->created_at->format('M j, Y H:ia') }}</td>
                                                    <td class="product-price">{{ $new->updated_at->format('M j, Y H:ia') }}</td>
                                                    <td>
                                                        <a href="" type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 editBtn"  data-toggle="tooltip" title="Edit" data-all="{{ (json_encode($new)) }}"><i class="feather icon-edit"></i></a>
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
                                                    <h4>ADD NEWS IN {{ strtoupper($language->name) }}</h4>
                                                </div>
                                                <div class="hide-data-sidebar">
                                                    <i class="feather icon-x"></i>
                                                </div>
                                            </div>
                                            <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                                                @csrf
                                            <div class="data-items pb-3">
                                                <div class="data-fields px-2 mt-3">
                                                    <div class="row">
                                                        <div class="col-sm-12 data-field-col">
                                                            <label for="data-name">Title</label>
                                                            <input type="text" class="form-control" name="title" id="data-name">
                                                        </div>
                                                        <input type="hidden" name="language" value="{{ $language->id }}">
                                                        <div class="col-sm-12 data-field-col">
                                                            <label for="data-price">Body</label>
                                                            <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Textarea" name="body"></textarea>
                                                        </div>
                                                         <div class="col-sm-12 data-field-col data-list-upload">
                                                             <label for="data-price">Upload</label>
                                                             <input type="file" name="file">
                                                         </div>
                                                        {{-- <div class="col-sm-12 data-field-col data-list-upload">
                                                            <form action="#" class="dropzone dropzone-area" id="dataListUpload">
                                                                <div class="dz-message">Upload Image</div>
                                                            </form>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                <div class="add-data-btn">
                                                    {{-- <button class="btn btn-primary">Add Data</button> --}}
                                                    <input type="submit" class="btn btn-primary" value="Add News">
                                                </div>
                                            </form>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- add new sidebar ends -->
                                </section>
                                <!-- Data list view end -->

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Nav Justified Ends -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-vertical" action="{{ route('admin.news.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Title</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="title" placeholder="Title">
                                </div>
                            </div>
                            <input type="hidden" name="news_id">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Body</label>
                                   <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Body" name="body"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Upload Image</label>
                                    <input type="file" name="file">
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