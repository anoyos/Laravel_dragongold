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
@php
switch($transaction->status){
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
        <div class="card-head text-right"><a href="{{ URL::previous() }} " class="btn btn-primary mt-1 mr-1" data-toggle="tooltip" title="Back to transactions"><i class="feather icon-corner-down-left"></i></a></div>

        <div class="card-body">
            <h4 class="card-title">Ref:{{ $transaction->$name }} </h4>
            <p class="card-text">{{ $transaction->description }}</p>
        </div>
        <ul class="list-group list-group-flush">


            <li class="list-group-item">
                <span class="badge badge-pill bg-success float-right">{{ ucwords($transaction->user->name) }} </span>
                Name
            </li>
            <li class="list-group-item">
                <span class="badge badge-pill bg-success float-right">{{ ucwords($transaction->type) }} </span>
                Transaction Type
            </li>
            <li class="list-group-item">
                <span class="badge badge-pill bg-primary float-right">{{ $transaction->currency->name }} </span>
                Currency
            </li>
            <li class="list-group-item">
                <span class="badge badge-pill bg-info float-right">{{ $transaction->amount }}</span>
                Amount
            </li>

            @if($type == 'deposit' || $type == 'withdraw')
            <li class="list-group-item">
                <span class="badge badge-pill bg-warning float-right">{{ $transaction->$type->address }}</span>
                Address
            </li>

            @elseif($type == 'credit')
            <li class="list-group-item">
                <span class="badge badge-pill bg-info float-right">{{ 'Credit' }}</span>
                Credit
            </li>

            @elseif($type == 'referral')

            <li class="list-group-item">
                <span class="badge badge-pill bg-info float-right">{{ $transaction->$type }}</span>
                Uplink
            </li>
            @endif
            <li class="list-group-item">
                <span class="badge badge-pill {{ $status_color }} float-right">{{ $transaction->status }} </span>
                Status
            </li>
            <li class="list-group-item">
                <span class="badge badge-pill bg-danger float-right">{{ $transaction->created_at->format('M j, Y H:ia') }} </span>
                Date Created
            </li>


        </ul>
        <div class="card-body">

        </div>
    </div>
</div>
@endsection