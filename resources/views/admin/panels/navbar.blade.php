<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-light navbar-shadow {{ $configData['navbarColor'] }}">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                        <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                        <!--     i.ficon.feather.icon-menu-->
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Content Layout"><i class="ficon feather icon-sidebar"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="/full" data-toggle="tooltip" data-placement="top" title="Full Layout"><i class="ficon feather icon-file-text"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                            <div class="bookmark-input search-input">
                                <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="form-control input" type="text" placeholder="Explore Vuesax..." tabindex="0" data-search="laravel-starter-list" />
                                <ul class="search-list"></ul>
                            </div>
                            <!-- select.bookmark-select-->
                            <!--   option 1-Column-->
                            <!--   option 2-Column-->
                            <!--   option Static Layout-->
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                    </li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                            <input class="input" type="text" placeholder="Explore Vuesax..." tabindex="-1" data-search="starter-list" />
                            <div class="search-input-close"><i class="feather icon-x"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">{{$notifications->count()}}</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">{{$notifications->count()}} New</h3><span class="grey darken-2">App Notifications</span>
                                </div>
                            </li>
                            <li class="scrollable-container media-list">
                                @foreach($notifications as $note)
                                @php
                                    switch($note->data['type']){
                                     case 'withdraw':
                                      $head = "Withdraw Notification!";
                                      $type = 'success';
                                      $ic = 'icon-check-circle';
                                      break;
                                     case 'deposit':
                                      $head = "Deposit Notification!";
                                      $type = 'success';
                                      $ic = 'icon-trending-down';
                                      break;
                                     case 'error':
                                      $head = "Error!";
                                      $type = 'danger';
                                      $ic = 'icon-alert-triangle';
                                      break;
                                     default:
                                      $head = 'New Notification!';
                                      $type = 'primary';
                                      $ic = 'icon-plus-square';
                                    }
                                
                                @endphp
                                <a class="d-flex justify-content-between" href="javascript:void(0)" id="notification" data-note="{{ $note->id }}">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather {{$ic}} font-medium-5 {{$type}}"></i></div>
                                        <div class="media-body">
                                            <h6 class="{{$type}} media-heading">{{$head}}</h6><small class="notification-text">{{ Str::limit($note->data['message'], 100)}}</small>
                                        </div><small>
                                            <time class="media-meta" datetime="{{$note->created_at}}">{{$note->created_at->diffForHumans()}}</time></small>
                                    </div>
                                </a>
                                @endforeach

                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{Auth::user()->name}}</span><span class="user-status">Available</span></div><span><img class="round" src="{{asset('admin_assets/images/portrait/small/avatar-s-11.png')}}" alt="avatar" height="40" width="40" /></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item chgPwd" href="#" data-admin="{{ Auth::user()->id }}"><i class="feather icon-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="feather icon-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="feather icon-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="feather icon-message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="feather icon-power"></i> Logout</a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->

<!-- Modal -->
<div class="modal fade text-left" id="note_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success white">
                <h5 class="modal-title" id="myModalLabel110"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dismiss" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<!--Edit Modal -->
<div class="modal fade" id="chgPwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-vertical" action="{{ route('admin.admin.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Old Password</label>
                                    <input type="password" class="form-control" name="old_pwd" placeholder="Enter Old Password" required="true">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">New Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="New Password" required="true">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">New Password Again</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required="true">
                                </div>
                            </div>
                            <input type="hidden" name="admin_id">
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>