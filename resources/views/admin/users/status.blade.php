<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', $title)

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
                    var id = $(this).attr('id');
                    var c_url = "{{ route('api.user.show') }}";
                    $.ajax({
                        url: c_url,
                        type: 'get',
                        data: {'modal': true, 'user_id': id, '_token':$('meta[name="csrf-token"]').attr('content')},
                        success: function (data, status) {
                            if (data) {
                                console.log(data);
                                $("#profileModal .name").html(data.fullname);
                                $("#profileModal .email").html(data.email);
                                $("#profileModal .status").html(data.status == 1 ? 'Active' : 'Blocked');
                                if(data.status == 1){
                                    $("#profileModal .status").addClass('btn-success');
                                }else{
                                    $("#profileModal .status").addClass('btn-danger')
                                }
                                $("#profileModal .modal-title").html(data.username.toUpperCase()+' Profile');
                                $("#profileModal .invested").html(data.totalInvested);
                                $("#profileModal .withdraw").html(data.totalWithdraw);
                                $("#profileModal .balance").html(data.balance);
                                
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
                                    <th>#</th>
                                    <th>USERNAME</th>
                                    <th>NAME</th>
                                    <th>TOTAL INVESTED</th>
                                    <th>TOTAL BALANCE</th>
                                    <th>STATUS</th>
                                    <th>DATE JOINED</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                @php
                                    $status = $user->status == 1 ? 'lock' : 'unlock';
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="product-name">{{ $user->username }}</td>
                                    <td class="product-category">{{ $user->fname.' ' .$user->lname }}</td>
                                    <td>
                                        @usd(TransactionHelper::totalInvested($user))
                                    </td>
                                    <td>@usd(TransactionHelper::totalBalance($user))</td>
                                    <td>
                                        <div class="chip chip-{{ $user->status == 1 ? 'success' : 'warning' }}">
                                            <div class="chip-body">
                                                <div class="chip-text">{{ $user->status == 1 ? 'Active' : 'Blocked' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">{{ $user->created_at->format('M j, Y H:ia') }}</td>
                                    <td>
                                        <a href="#" id="{{ $user->id }}" type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 showBtn"  data-toggle="tooltip" title="View"><i class="feather icon-eye"></i></a>

                                        <a href="{{ route('admin.'.$status.'_user', $user->id) }}" type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1"  data-toggle="tooltip" title="{{ $status == 'lock' ? 'Block' : 'Unblock' }}"><i class="feather icon-{{ $status }}"></i></a>
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

                            <div class="twPc-divUser">
                                <div class="twPc-divName">
                                    <p class="name"></p>
                                </div>
                                <span>
                                    <a href="#"><span class="email"></span></a>
                                </span>
                            </div>

                            <div class="twPc-divStats">
                                <ul class="twPc-Arrange">
                                    <li class="twPc-ArrangeSizeFit">
                                        <a href="#" title="Total Invested">
                                            <span class="twPc-StatLabel twPc-block">Invested</span>
                                            <span class="twPc-StatValue invested"></span>
                                        </a>
                                    </li>
                                    <li class="twPc-ArrangeSizeFit">
                                        <a href="#" title="Total Withdraw">
                                            <span class="twPc-StatLabel twPc-block">Withdraw</span>
                                            <span class="twPc-StatValue withdraw">885</span>
                                        </a>
                                    </li>
                                    <li class="twPc-ArrangeSizeFit">
                                        <a href="#" title="Balance">
                                            <span class="twPc-StatLabel twPc-block">Balance</span>
                                            <span class="twPc-StatValue balance">1.810</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                                </div>
                                {{-- <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </section>
                <!-- Data list view end -->
@endsection