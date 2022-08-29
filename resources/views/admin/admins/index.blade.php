<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'All Admin')

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
<script type="text/javascript">
    $(".showBtn").click(function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    var c_url = "{{ route('admin.admin.show') }}";
                    $.ajax({
                        url: c_url,
                        type: 'post',
                        data: {'modal': true, 'admin_id': id, '_token':$('meta[name="csrf-token"]').attr('content')},
                        success: function (data, status) {
                            if (data) {
                                admin = JSON.parse(data);
                                
                                $("#profileModal .name").html(admin.name);
                                $("#profileModal .email").html(admin.email);
                                $("#profileModal .created").html(admin.created_at);
                                $("#profileModal .updated").html(admin.updated_at);
                                $("#profileModal .status").html(admin.access == '1' ? 'Has Access' : 'No Access');
                                if(admin.access == '1'){
                                    $("#profileModal .status").addClass('btn-success');
                                }else{
                                    $("#profileModal .status").addClass('btn-danger')
                                }
                                $("#profileModal .modal-title").html(admin.username.toUpperCase()+' Profile');
                                
                                $("#profileModal").modal('show');
                            }
                            else {
                                alert('failed');
                            }
                        },
                        error: function (xhr, desc, err) {
                            //alert(err.msg())
                        }
                    });

                    
                });

    $(".editBtn").click(function (e) {
        e.preventDefault();
        try{
            var d = $(this).data('id');

            $("#editModal [name='admin_id']").val(d);                           
            $("#editModal").modal('show');
        }
        catch(err){
            alert(err);
        }
    });
</script>
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
                    <th>USERNAME</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>ACCESS</th>
                    <th>DATE JOINED</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)

                                @php
                                    $access = $admin->access == 1 ? 'Yes' : 'No';
                                @endphp
                                <tr>
                                    <td class="product-name">{{ $admin->username }}</td>
                                    <td class="product-category">{{ $admin->name }}</td>
                                    <td class="product-category">{{ $admin->email }}</td>
                                    <td>
                                        <div class="chip chip-{{ $admin->access == 1 ? 'success' : 'danger' }}">
                                            <div class="chip-body">
                                                <div class="chip-text">{{ $access }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">{{ is_null($admin->created_at) ? 'N/A' : $admin->created_at->format('M j, Y H:ia') }} </td>
                                    <td>
                                        <a href="#" data-id="{{ $admin->id }}" type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 showBtn" data-toggle="tooltip" title="View"><i class="feather icon-eye"></i></a>

                                         <a href="#" data-id="{{ $admin->id }}" type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 editBtn" data-toggle="tooltip" title="Change Password"><i class="feather icon-edit"></i></a>
                                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- DataTable ends -->
<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="twPc-div">
    <a class="twPc-bg twPc-block"></a>

    <div>
        <div class="twPc-button">
            <button class="btn status"></button>
        </div>

        <a title="Avatar" href="#" class="twPc-avatarLink">
            <img alt="Avatar" src="" class="twPc-avatarImg">
        </a>

        <div class="twPc-divadmin">
            <div class="twPc-divName">
                <p class="name"></p>
            </div>
            <span>
                <a href="#"><span class="email"></span></a>
            </span>
        </div>

    </div>
    <div class="twPc-divStats">
            <ul class="twPc-Arrange">
                <li class="twPc-ArrangeSizeFit">
                    <a href="#" title="Total Invested">
                        <span class="twPc-StatLabel twPc-block">Created At</span>
                        <span class="twPc-StatValue invested created"></span>
                    </a>
                </li>
                <li class="twPc-ArrangeSizeFit">
                    <a href="#" title="Total Withdraw">
                        <span class="twPc-StatLabel twPc-block">Updated At</span>
                        <span class="twPc-StatValue updated"></span>
                    </a>
                </li>
            </ul>
        </div>
</div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
            </div> --}}
        </div>
    </div>
</div>


<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                <form class="form form-vertical" action="{{ route('admin.admin.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Old Password</label>
                                    <input type="password" class="form-control" name="old_pwd" placeholder="Enter Old Password" required="true">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">New Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="New Password" required="true">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">New Password Again</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required="true">
                                </div>
                            </div>
                            <input type="hidden" name="admin_id">
                            
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

<!-- add new sidebar starts -->
<div class="add-new-data-sidebar">
    <div class="overlay-bg"></div>
    <div class="add-new-data">
        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
            <div>
                <h4>ADD ADMIN</h4>
            </div>
            <div class="hide-data-sidebar">
                <i class="feather icon-x"></i>
            </div>
        </div>
        <form method="POST" action="{{ route('admin.admin.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="data-items pb-3">
                <div class="data-fields px-2 mt-3">
                    <div class="row">
                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">Username</label>
                            <input type="text" class="form-control" name="username" id="data-name">
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">Full Name</label>
                            <input type="text" class="form-control" name="name" id="data-name">
                        </div>

                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">Email</label>
                            <input type="email" class="form-control" name="email" id="data-name">
                        </div>

                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">Password</label>
                            <input type="password" class="form-control" name="password" id="data-name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                <div class="add-data-btn">
                    <input type="submit" class="btn btn-primary" value="Add Admin">
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
@endsection