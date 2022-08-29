<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'All Transactions')

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
                                    <th>USER</th>
                                    <th>AMOUNT</th>
                                    <th>AMOUNT ($)</th>
                                    <th>TYPE</th>
                                    <th>STATUS</th>
                                    <th>DATE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)

                                @php
                                    switch($transaction->status){
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
                                @endphp
                                    
                                <tr>
                                    <td class="product-name"><a href="{{route('admin.user.show',$transaction->user->id)}}">{{ $transaction->user->name }}</a></td>
                                    <td class="product-price">
                                        {{ $transaction->amount }} {{ $transaction->currency->symbol }}
                                    </td>
                                    <td class="product-price">
                                        @usd($transaction->amount * $transaction->currency->usdrate)
                                    </td>
                                    <td>
                                        {{ $transaction->type }}
                                    </td>
                                    <td>
                                        <div class="chip chip-{{ $status_color }}">
                                            <div class="chip-body">
                                                <div class="chip-text">{{ $transaction->status }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price">{{ $transaction->created_at->format('M j, Y H:ia') }} </td>
                                    <td> <a href="{{ route('admin.transactions.detail', $transaction->id) }}" class="btn btn-icon btn-outline-info" data-toggle="tooltip" title="View"><i class="feather icon-eye"></i></a> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->
                </section>
                <!-- Data list view end -->
@endsection