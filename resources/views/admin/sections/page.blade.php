<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', $page->title)

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

<script src="{{ asset('admin_assets/js/scripts/components.js') }}"></script>

<script src="{{ asset('admin_assets/js/scripts/ui/data-list-view.js') }}"></script>
<script type="text/javascript">

        $(document).ready(function () { 
            
            $('body').on('click', '.editBtn', e => {
                e.preventDefault();
                try{
                    
                    var d = $(e.currentTarget).data('all');
                    $("#editModal [name='section_id']").val(d.id);
                    $("#editModal [name='name']").val(d.name);
                    $("#editModal [name='content']").val(d.content);
                    $("#editModal").modal('show');
                }
                catch(err){
                    alert(err);
                }
            });
        });
</script> 
@endsection

@section('content')

<!-- Nav Justified Starts -->
<section id="nav-justified">
    <div class="row">
        <div class="col-sm-12">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h4 class="card-title">Page</h4>
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
                                                    <th>#</th>
                                                    <th>NAME</th>
                                                    <th>CONTENT</th>
                                                    <TH>UPDATED AT</TH>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($language->pageSections()->where('page_id', $page->id)->get() as $sec)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="product-name">{{ $sec->name }}</td>
                                                    <td class="product-category">
                                                        {{ strlen($sec->content) > 50 ? substr($sec->content, 0, 50)."..." : $sec->content }}
                                                    </td>
                                                    <td class="product-price">{{ !is_null($sec->updated_at) ? $sec->updated_at->format('M j, Y H:ia') : "N/A" }}</td>
                                                    <td>
                                                        <a href="#" type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 editBtn"  data-toggle="tooltip" title="Edit" data-all="{{ (json_encode($sec)) }}"><i class="feather icon-edit"></i></a>
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
                                                    <h4>ADD SECTION IN {{ strtoupper($language->name) }}</h4>
                                                </div>
                                                <div class="hide-data-sidebar">
                                                    <i class="feather icon-x"></i>
                                                </div>
                                            </div>
                                            <form method="POST" action="{{ route('admin.page.store') }}" enctype="multipart/form-data">
                                                @csrf
                                            <div class="data-items pb-3">
                                                <div class="data-fields px-2 mt-3">
                                                    <div class="row">
                                                        <div class="col-sm-12 data-field-col">
                                                            <label for="data-name">Section Name</label>
                                                            <select class="select2 form-control" name="name">
                                                                @foreach($page->sections as $section)
                                                                    <option value="{{ $section->name }}">{{ $section->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="language" value="{{ $language->id }}">
                                                        <input type="hidden" name="page" value="{{ $page->id }}">
                                                        <div class="col-sm-12 data-field-col">
                                                            <label for="data-price">Content</label>
                                                            <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Textarea" name="content"></textarea>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                <div class="add-data-btn">
                                                    <input type="submit" class="btn btn-primary" value="Add Section">
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Sections</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-vertical" action="{{ route('admin.page.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Section Name</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="name" placeholder="Section Name">
                                </div>
                            </div>
                            <input type="hidden" name="section_id">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Content</label>
                                   <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Content" name="content"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection