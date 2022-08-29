<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'All News')

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

        $(document).ready(function () {
           
            $(".editBtn").click(function (e) {
                e.preventDefault();
                try{
                    var d = $(this).data('all');

                    $("#editModal [name='news_id']").val(d.id);
                    $("#editModal [name='title']").val(d.title);
                    $("#editModal [name='body']").val(d.body);
                    
                    
                    $("#editModal").modal('show');
                }
                catch(err){
                    alert(err);
                }
            });

        });//end ready

    </script> 
@endsection

@section('content')

<div class="row">
    <div class="col-md-12 col-xl-12 col-sm-12">
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
</div>


@endsection