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

<script type="text/javascript">

        $(document).ready(function () { 
            $('body').on('focusout', '.lang-item', e => {
                e.preventDefault();
                let item = $(e.currentTarget);
                
                let url = `{{route('admin.translation.updateitem', $language->code)}}`;
                let _token = '{{csrf_token()}}';
                let params = {
                    _token,
                    source : item.data('source'),
                    value : item.val()
                };
                
                $.post(url, params, function(e){
                    console.log(e);
                });
            });
        });
</script> 
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
            {{ $lang->name}}
            </a>
        @endforeach
        <form action="{{route('admin.translation.updatelocale', $language->code)}}" method="POST">
            @csrf
                <table class="table data-list-view">
                    <thead>
                        <tr>
                            <th>ENGLISH</th>
                            <th>{{ $language->name }} <input type="submit" value="SAVE" class="btn btn-success squares" /></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($translations as $k => $v)
                        <tr>
                            <td> <input class="form-control square" value="{{$k}}" readonly="readonly" />  </td>
                            <td> <input name="keys[{{$k}}]"  data-source="{{$k}}" class="form-control square lang-item" value="{{$localeTranslation[$k]}}" /></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
    </div>
    <!-- DataTable ends -->

</section>
<!-- Data list view end -->
<!--/ Description -->
@endsection