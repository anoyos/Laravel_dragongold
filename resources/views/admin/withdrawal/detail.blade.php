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
@endsection

@section('content')

{{-- <div class="col-xl-4 col-md-6 col-sm-12"> --}}
                            @php
                                    switch($withdrawal->status){
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
                                @endphp
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-head text-right"><a href="{{ URL::previous() }} " class="btn btn-primary mt-1 mr-1" data-toggle="tooltip" title="Back to Withdrawals"><i class="feather icon-corner-down-left"></i></a></div>
                                    <div class="card-body">
                                        <h4 class="card-title">Ref:{{ $withdrawal->withdraw->reference }} </h4>
                                        <p class="card-text">{{ $withdrawal->description }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{{ $withdrawal->currency->name }} </span>
                                            Currency
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-info float-right">{{ $withdrawal->amount }}</span>
                                            Amount
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-warning float-right">{{ $withdrawal->withdraw->address }}</span>
                                            Address
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill {{ $status_color }} float-right">{{ $withdrawal->status }} </span>
                                            Status
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-danger float-right">{{ $withdrawal->withdraw->created_at->format('M j, Y H:ia') }} </span>
                                            Date Withdrawn
                                        </li>
                                    </ul>
                                    <div class="card-body">
                                        {{-- <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a> --}}
                                    </div>
                                </div>
                            </div>
                        {{-- </div> --}}

@endsection