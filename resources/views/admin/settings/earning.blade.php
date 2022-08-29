<!-- Description -->
@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Earning Settings')

@section('content')

<section id="description" class="card">
    <div class="card-header">
        <h4 class="card-title">Earning Settings</h4>
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
            <form class="form form-horizontal" method="POST" action="{{route('admin.settings.earning.save')}}">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Profit during Week Days</span>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-label-group position-relative has-icon-right">
                                        <input type="text" id="contact-floating-icon" class="form-control" value="{{config('global.profit_main')}}" name="profit_main">
                                        <div class="form-control-position"> % </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Profit during Weekends</span>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-label-group position-relative has-icon-right">
                                        <input type="text" id="contact-floating-icon" class="form-control" value="{{config('global.profit_weekend')}}" name="profit_weekend">
                                        <div class="form-control-position"> % </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Max Withdrawal on Auto</span>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="text" id="contact-floating-icon" class="form-control" value="{{config('global.auto_max')}}" name="auto_max">
                                        <div class="form-control-position">$</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Affiliate Level 1</span>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-label-group position-relative has-icon-right">
                                        <input type="text" id="contact-floating-icon" class="form-control" value="{{config('global.affiliate_l1')}}" name="affiliate_l1" placeholder="Affiliate Level 1">
                                        <div class="form-control-position"> % </div>
                                        <label for="contact-floating-icon">Affiliate Level 1</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Affiliate Level 2</span>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-label-group position-relative has-icon-right">
                                        <input type="text" id="contact-floating-icon" class="form-control" value="{{config('global.affiliate_l2')}}" name="affiliate_l2" placeholder="Affiliate Level 2">
                                        <div class="form-control-position"> % </div>
                                        <label for="contact-floating-icon">Affiliate Level 2</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Affiliate Level 3</span>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-label-group position-relative has-icon-right">
                                        <input type="text" id="contact-floating-icon" class="form-control" value="{{config('global.affiliate_l3')}}" name="affiliate_l3" placeholder="Affiliate Level 3">
                                        <div class="form-control-position"> % </div>
                                        <label for="contact-floating-icon">Affiliate Level 3</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Affiliate Level 4</span>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-label-group position-relative has-icon-right">
                                        <input type="text" id="contact-floating-icon" class="form-control" value="{{config('global.affiliate_l4')}}" name="affiliate_l4" placeholder="Affiliate Level 4">
                                        <div class="form-control-position"> % </div>
                                        <label for="contact-floating-icon">Affiliate Level 4</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Affiliate Level 5</span>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-label-group position-relative has-icon-right">
                                        <input type="text" id="contact-floating-icon" class="form-control" value="{{config('global.affiliate_l5')}}" name="affiliate_l5" placeholder="Affiliate Level 5">
                                        <div class="form-control-position"> % </div>
                                        <label for="contact-floating-icon">Affiliate Level 5</label>
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