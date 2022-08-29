<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'All Deposits')

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
    
    function open_modal(transaction_id, ref){
        var t_id = transaction_id;
        console.log(t_id);
        $("#assistModal [name='transaction']").val(t_id);
        $("#assistModal .ref").html('Transaction Ref: '+ ref);

        $("#assistModal").modal('show');
    }
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
                                    <th>USER</th>
                                    <th>Transaction ID</th>
                                    <th>AMOUNT</th>
                                    <th>AMOUNT ($)</th>
                                    <th>TYPE</th>
                                    <th>STATUS</th>
                                    <th>DATE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deposits as $deposit)

                                @php
                                    switch($deposit->status){
                                        case 'active':
                                            $status_color = 'success';
                                            break;
                                        case 'confirming':
                                            $status_color = 'primary';
                                            break;
                                        case 'pending':
                                            $status_color = 'warning';
                                            break;
                                        case 'canceled':
                                            $status_color = 'danger';
                                            break;
                                        default:
                                            break;
                                    }

                                    $assist = "";

                                    if ($deposit->status == 'pending'){
                                        $assist = "<a href='#' class='btn btn-icon btn-outline-warning' data-toggle='tooltip' title='Assist' onclick=\"open_modal('".$deposit->id."','".$deposit->deposit->reference."')\"><i class='fa fa-balance-scale'></i></a>";
                                    }

                                @endphp
                                    
                                <tr>
                                    <td class="product-name"><a href="{{route('admin.user.show',$deposit->user->id)}}">{{ $deposit->user->name }}</a></td>
                                    <td>
                                        {{ $deposit->deposit->reference }}
                                    </td>
                                    <td class="product-price">
                                        {{ $deposit->amount }} {{ $deposit->currency->symbol }}
                                    </td>
                                    <td class="product-price">
                                        @usd($deposit->amount * $deposit->currency->usdrate)
                                    </td>
                                    <td>
                                        {{ $deposit->deposit->type }}
                                    </td>
                                    <td>
                                        <div class="chip chip-{{ $status_color }}">
                                            <div class="chip-body">
                                                <div class="chip-text">{{ $deposit->status }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $deposit->created_at->format('M j, Y H:ia') }} </td>
                                    <td> <a href="{{ route('admin.deposits.detail', $deposit->id) }}" class="btn btn-icon btn-outline-info" data-toggle="tooltip" title="View"><i class="feather icon-eye"></i></a>&nbsp {!! $assist !!} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->
                </section>
                <!-- Data list view end -->
                <!-- Modal -->
<div class="modal fade" id="assistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ref" id="exampleModalCenterTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-vertical" action="{{ route('admin.deposits.assist') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Amount</label>
                                    <input type="number" id="first-name-vertical" class="form-control" name="paid" placeholder="Amount">
                                </div>
                            </div>
                            <input type="hidden" name="transaction">
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-success mr-1 mb-1">Assist</button>
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