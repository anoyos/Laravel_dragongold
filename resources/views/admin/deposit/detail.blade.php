<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', $title )

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

{{-- <div class="col-xl-4 col-md-6 col-sm-12"> --}}
                            @php
                                    switch($deposit->status){
                                        case 'active':
                                            $status_color = 'bg-success';
                                            break;
                                        case 'confirming':
                                            $status_color = 'bg-primary';
                                            break;
                                        case 'pending':
                                            $status_color = 'bg-warning';
                                            break;
                                        case 'canceled':
                                            $status_color = 'bg-danger';
                                            break;
                                        default:
                                            break;
                                        }

                                        $assist = "";

                                    if ($deposit->status == 'pending'){
                                        $assist = "<a href='#' class='btn btn-icon btn-outline-warning' data-toggle='tooltip' title='Assist' onclick=\"open_modal('".$deposit->id."','".$deposit->deposit->reference."')\"><i class='fa fa-balance-scale'></i></a>";
                                    }
                                @endphp
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-head text-right"><a href="{{ URL::previous() }} " class="btn btn-primary mt-1 mr-1" data-toggle="tooltip" title="Back to Deposits"><i class="feather icon-corner-down-left"></i></a></div>
                                    <div class="card-body">
                                        <h4 class="card-title" style="display: block; float: left">Ref:{{ $deposit->deposit->reference }} </h4>&nbsp {!! $assist !!}
                                        <p class="card-text">{{ $deposit->description }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{{ $deposit->currency->name }} </span>
                                            Currency
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-info float-right">{{ $deposit->amount }}</span>
                                            Amount
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-warning float-right">{{ $deposit->deposit->address }}</span>
                                            Address
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill {{ $status_color }} float-right">{{ $deposit->status }} </span>
                                            Status
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-danger float-right">{{ $deposit->deposit->confirmations_needed }} </span>
                                            Confirmations Needed
                                        </li>
                                    </ul>
                                    <div class="card-body">
                                        {{-- <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a> --}}
                                    </div>
                                </div>
                            </div>
                        {{-- </div> --}}

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