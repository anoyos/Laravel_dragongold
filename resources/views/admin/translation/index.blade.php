<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Translation')
@section('mystyle')
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/vendors/css/tables/datatable/datatables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/pages/data-list-view.css') }}">
@endsection

@section('myscript')
<script src="{{ asset('admin_assets/vendors/js/extensions/dropzone.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/scripts/components.js') }}"></script>

<script src="{{ asset('admin_assets/js/scripts/ui/data-list-view.js') }}"></script>
@endsection

@section('content')
<!-- Data list view starts -->
<section id="data-list-view" class="data-list-view-header">

    <!-- DataTable starts -->
    <div class="table-responsive">
        
        @foreach($languages as $lang)
            <a href="{{route('admin.translation.locale', ['locale' => $lang->code])}}" 
               class="btn btn-outline-primary square">
                <img src="{{ asset('images/flags/' . $lang->code  . '.svg') }}" alt="{{$lang->code}}" width="30">
            {{ $lang->name}}</a>
        @endforeach
        <table class="table data-list-view">
            <thead>
                <tr>
                    <th>ACTION</th>
                    <th>CONTENT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($translations as $k => $v)
                <tr>
                    <td>
                        <a href="{{ route('admin.translation')}}" >Edit <i class="feather icon-edit"></i></a>
                    </td>
                    <td>{{$k}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- DataTable ends -->

</section>
<!-- Data list view end -->
<!--/ Description -->
@endsection