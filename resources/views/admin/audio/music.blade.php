<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Audios')

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
            
            $('body').on('click', '.deleteBtn', e => {
                e.preventDefault();
                try{
                    
                    var id = $(e.currentTarget).data('id');
                    $("#dltModal [name='audio_id']").val(id);
                    $("#dltModal").modal('show');
                }
                catch(err){
                    alert(err);
                }
            });
        });

        function play(url){
            var audio = new Audio(url);
            if(audio.paused){
                audio.play();
                $('#play').removeClass('icon-play');
                $('#play').addClass('icon-pause');
            }else if(audio.duration > 0 && !audio.paused){
                audio.pause();
                audio.currentTime = 0;
                $('#play').removeClass('icon-pause');
                $('#play').addClass('icon-play');
            }
        }
</script> 
@endsection

@section('content')

<!-- Data list view starts -->
<section id="data-thumb-view" class="data-thumb-view-header">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- dataTable starts -->
    <div class="table-responsive">
        <table class="table data-thumb-view">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>TYPE</th>
                    <th>CREATED AT</th>
                    <th>PLAY</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($audios as $audio)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="product-name">{{ $audio->name }}</td>
                    <td>{{ $audio->type }}</td>
                    <td>{{ !is_null($audio->created_at) ? $audio->created_at->format('M j, Y H:ia') : "N/A" }}</td>
                    <td>
                        <i class="feather icon-play" id="play" onclick="play('{{ asset('audio/music/'.$audio->name.'.mp3') }}')"></i>
                    </td>
                    <td>

                                                        <a href="#" type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 deleteBtn"  data-toggle="tooltip" title="Delete" data-id="{{ $audio->id }}"><i class="feather icon-trash"></i></a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <!-- dataTable ends -->

    <!-- add new sidebar starts -->
    <div class="add-new-data-sidebar">
        <div class="overlay-bg"></div>
        <div class="add-new-data">
            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                <div>
                    <h4>ADD Audio to Music</h4>
                </div>
                <div class="hide-data-sidebar">
                    <i class="feather icon-x"></i>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.audio.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="data-items pb-3">
                    <div class="data-fields px-2 mt-3">
                        <div class="row">
                            <div class="col-sm-12 data-field-col">
                                <label for="data-name">Type</label>
                                <select class="select2 form-control" name="type">
                                    <option value="music">Music</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Upload Audio</label>
                                    <input type="file" name="file" class="form-control-file">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                    <div class="add-data-btn">
                        <input type="submit" class="btn btn-primary" value="Add Audio">
                    </div>
                    <div class="cancel-data-btn">
                        <button type="reset" class="btn btn-outline-danger">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- add new sidebar ends -->
</section>
<!-- Data list view end 
<!-- Modal -->
<div class="modal fade" id="dltModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete Audio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Are you sure you want to Delete?</h3>
                <form class="form form-vertical" action="{{ route('admin.audio.delete') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">

                            <input type="hidden" name="audio_id">
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-danger mr-1 mb-1">Delete</button>

                                <button type="button" class="btn btn-primary mr-1 mb-1" data-dismiss="modal" aria-label="Close">Cancel
                                    {{-- <span aria-hidden="true">Cancel</span> --}}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection