<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              @if( getContact('count') > 0 )
                <span class="label label-danger">{{ getContact('count') }}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{ getContact('count') }} messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                  @if( getContact('count') > 0 )
                    
                    @foreach(getContact() as $message)
                      <li><!-- start message -->
                        <a href="{{ route('message.show' , $message->id ) }}">
                          <div class="pull-left">
                            <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            {{ $message->subject }}
                            <small><i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans() }} </small>
                          </h4>
                          <p>{{ str_limit($message->message , 100) }}</p>
                        </a>
                      </li>
                    @endforeach

                  @else
                     <li><!-- start message -->
                      <a href="#">
                        <p>No Message</p>
                      </a>
                    </li>
                  @endif
                  
                </ul>
              </li>
              <li class="footer"><a href="{{ route('message.index') }}">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
               @if( getOrder('count') > 0 )
                <span class="label label-warning">{{ getOrder('count') }}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <b style="font-size:16px;color:tomato">{{ getOrder('count') }}</b> Orders</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  

                  @if( getOrder('count') > 0 )
                    
                    @foreach(getOrder() as $order)
                      <li><!-- start message -->
                        <a href="{{ route('order.show' , $order->id ) }}">
                          <div class="pull-left">
                            <i class="fa fa-shopping-cart fa-lg fa-fw text-success"></i>
                          </div>
                          <h6>
                            {{ $order->user->name }}
                            <small><i class="fa fa-clock-o"></i> {{ $order->created_at->diffForHumans() }} </small>
                          </h6>
                        </a>
                      </li>
                    @endforeach

                  @else
                     <li><!-- start message -->
                      <a href="#">
                        <p>No Order</p>
                      </a>
                    </li>
                  @endif
               
                </ul>
              </li>
              <li class="footer"><a href="{{ route('order.index') }}">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
                @if( app()->getLocale() == 'en' )
                    Language
                @else
                    اللغه
                @endif
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset(auth()->guard('admin')->user()->avatar) }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ auth()->guard('admin')->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset(auth()->guard('admin')->user()->avatar) }}" class="img-circle" alt="User Image">

                <p>
                {{ auth()->guard('admin')->user()->name }}
                  <small>Member since {{ auth()->guard('admin')->user()->created_at->format('d-m-Y') }}</small>
                </p>
              </li>


              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profile.index') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
