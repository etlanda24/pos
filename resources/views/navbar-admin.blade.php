<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                @if (Auth::check() && Auth::user()->level == 'admin')
                <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
                  <p class="hidden-lg hidden-md">
                    5 Notifications
                    <b class="caret"></b>
                  </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">List Outlet</a></li>
                                <li><a href="#">List Transaksi</a></li>
                                <li><a href="#">List Barang</a></li>
                                <li><a href="#">List Supplier</a></li>
                              </ul>
                        </li>
                    </ul>

                <ul class="nav navbar-nav navbar-right">
                  <li>
                      <a href="{{route('register')}}">register</a>
                  </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                    Hi, {{ Auth::user()->name }}
                    <b class="caret"></b>
                  </p>
                              </a>
                    <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </li>
                    </ul>
                        </li>
                        
            <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
                  <p class="hidden-lg hidden-md">
                    5 Notifications
                    <b class="caret"></b>
                  </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                    Hi, {{ Auth::user()->name }}
                    <b class="caret"></b>
                  </p>
                              </a>
                    <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </li>
                    </ul>
                        </li>
                        
            <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                @endif      
                    
                </div>
            </div>
        </nav>
