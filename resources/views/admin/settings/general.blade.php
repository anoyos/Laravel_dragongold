<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'General Settings')

@section('mystyle')
<link rel="stylesheet" href="{{asset('admin_assets/vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection

@section('myscript')
<script src="{{ asset('admin_assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{ asset('admin_assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{ asset('admin_assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script>
$(document).ready(() => {
    $('.pickadate').pickadate({
        format: 'mmmm, d, yyyy',
        formatSubmit: 'yyyy-mm-dd'
    });
});
</script>
@endsection




@section('content')
<section id="description" class="card">
    <div class="card-header">
        <h4 class="card-title">General Settings</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class="form form-horizontal" method="POST" action="{{route('admin.settings.general.save')}}">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Platform Name</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="app" value="{{config('global.app')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Platform Title</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="title" value="{{config('global.title')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Description</span>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="description">{{config('global.description')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Launch Date</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control pickadate" name="launch_date" data-value="{{config('global.launch_date')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Front Page Video</span>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-label-group position-relative has-icon-left">
                                    <input type="text" class="form-control" name="video" value="{{config('global.video')}}">
                                    <div class="form-control-position">#</div>
                                    <label for="contact-floating-icon">https://www.youtube.com/watch?&v=</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--/ Description -->
@endsection