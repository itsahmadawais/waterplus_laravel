<!-- aside -->
  <div id="aside" class="app-aside modal nav-dropdown">
  	<!-- fluid app aside -->
    <div class="left navside dark dk" data-layout="column">
  	  <div class="navbar no-radius">
        <!-- brand -->
        <a class="navbar-brand">
        	<div ui-include="'../assets/images/logo.svg'"></div>
        	<img src="../assets/images/logo.png" alt="." class="hide">
        	<span class="hidden-folded inline">Water Plus</span>
        </a>
        <!-- / brand -->
      </div>
      <div class="hide-scroll" data-flex>
          <nav class="scroll nav-light">
            
              <ul class="nav" ui-nav>
                <li class="nav-header hidden-folded">
                  <small class="text-muted">Main</small>
                </li>
                @auth()
                @if(auth()->user()->role=="admin")
                <li>
                  <a href="{{url('dashboard')}}" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3fc;
                        <span ui-include="'../assets/images/i_0.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Dashboard</span>
                  </a>
                </li>

                <li>
                  <a href="{{url('custom-revenue')}}" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3fc;
                        <span ui-include="'../assets/images/i_0.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Custom Revenue</span>
                  </a>
                </li>
                
                <li>
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                      <i class="material-icons">&#xe5c3;
                        <span ui-include="'../assets/images/i_1.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Customers</span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="{{url('customers/add')}}" >
                        <span class="nav-text">Create New</span>
                      </a>
                    <li>
                      <a href="{{url('customers')}}" >
                        <span class="nav-text">View All</span>
                      </a>
                    </li>
                    </li>
                  </ul>
                </li>
                
            
                <li>
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                      <i class="material-icons">&#xe8f0;
                        <span ui-include="'../assets/images/i_2.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Purchases</span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="{{url('purchases/add')}}" >
                        <span class="nav-text">Add New</span>
                      </a>
                    </li>
                    {{--
                    <li>
                      <a href="{{url('purchases')}}" >
                        <span class="nav-text">View All</span>
                      </a>
                    </li>
                    --}}
                  </ul>
                </li>
                <li>
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                      <i class="material-icons">&#xe429;
                        <span ui-include="'../assets/images/i_4.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Expenses</span>
                  </a>
                  <ul class="nav-sub nav-mega nav-mega-3">
                    <li>
                      <a href="{{url('expenses/add')}}" >
                        <span class="nav-text">Create New</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('expenses')}}" >
                        <span class="nav-text">View All</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                      <i class="material-icons">&#xe429;
                        <span ui-include="'../assets/images/i_4.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Feedbacks</span>
                  </a>
                  <ul class="nav-sub nav-mega nav-mega-3">
                    <li>
                      <a href="{{url('feedbacks')}}" >
                        <span class="nav-text">View All</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                      <i class="material-icons">&#xe5c3;
                        <span ui-include="'../assets/images/i_1.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Sectors</span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="{{url('sectors/add')}}" >
                        <span class="nav-text">Create New</span>
                      </a>
                    <li>
                      <a href="{{url('sectors')}}" >
                        <span class="nav-text">View All</span>
                      </a>
                    </li>
                    </li>
                  </ul>
                </li>
                @else
                <li>
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                      <i class="material-icons">&#xe5c3;
                        <span ui-include="'../assets/images/i_1.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Dashboard</span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="{{url('customers/'.auth()->user()->id)}}" >
                        <span class="nav-text">My Profile</span>
                      </a>
                    <li>
                      <a href="{{url('purchases/'.auth()->user()->id)}}" >
                        <span class="nav-text">Bill</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="{{url('feedbacks/create')}}">
                    <span class="nav-icon">
                      <i class="material-icons">&#xe5c3;
                        <span ui-include="'../assets/images/i_1.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Give Feedback</span>
                  </a>
                </li>
                @endif
                @endauth
              </ul>
          </nav>
      </div>
    </div>
  </div>
  <!-- / -->