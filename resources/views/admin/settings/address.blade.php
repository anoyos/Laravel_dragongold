<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Company Address Settings')

@section('content')

<section id="description" class="card">
    <div class="card-header">
        <h4 class="card-title">Company Address Settings</h4>
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
            <form class="form form-horizontal" method="POST" action="{{route('admin.settings.address.save')}}">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Company Name</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="company_name" value="{{config('global.company_name')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Company Address</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="company_address" value="{{config('global.company_address')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Company Registration #</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="company_number" value="{{config('global.company_number')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Country</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="company_country" value="{{config('global.company_country')}}">
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