<!-- content -->
<div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
                <i class="material-icons">&#xe5d2;</i>
            </a>
            <!-- / -->

            <!-- Page title - Bind to $state's title -->
            <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>

            <!-- navbar collapse -->
            <div class="collapse navbar-collapse" id="collapse">
                <!-- link and dropdown -->
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        @if(auth()->user()->role=="admin")
                        <a class="nav-link" href="{{url('customers/add')}}" data-toggle="dropdown">
                            <i class="fa fa-fw fa-plus text-muted"></i>
                            <span>New Customer</span>
                        </a>
                        @endif
                        <div ui-include="'../views/blocks/dropdown.new.html'"></div>
                    </li>
                </ul>

                <div ui-include="'../views/blocks/navbar.form.html'"></div>
                <!-- / -->
            </div>
            <!-- / navbar collapse -->

            <!-- navbar right -->
            <ul class="nav navbar-nav ml-auto flex-row">
                <li class="nav-item dropdown pos-stc-xs">
                    <a class="nav-link mr-2" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="label label-md up warn">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                    <div ui-include="'../views/blocks/dropdown.notification.html'"></div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                        <span class="avatar w-32">
                            <img src="../assets/images/a0.jpg" alt="...">
                            <i class="on b-white bottom"></i>
                        </span>
                    </a>
                    <div ui-include="'../views/blocks/dropdown.user.html'"></div>
                </li>
                <li class="nav-item hidden-md-up">
                    <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
                        <i class="material-icons">&#xe5d4;</i>
                    </a>
                </li>
            </ul>
            <!-- / navbar right -->
        </div>
    </div>
    <div class="app-footer">
        <div class="p-2 text-xs">
            <div class="pull-right text-muted py-1">
                &copy; Copyright <strong>Butt Sahab Coprorations</strong> <span class="hidden-xs-down">- Built with Love v1.0</span>
                <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
            </div>
        </div>
    </div>
    <div ui-view class="app-body" id="view">
