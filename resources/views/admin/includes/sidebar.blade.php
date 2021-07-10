<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset(auth()->guard('admin')->user()->avatar) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->guard('admin')->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        


        <!-- Dashboard -->
        <li class="{{ Route::currentRouteName() == 'admin.index' ? 'active' : '' }}">
          <a href="{{ url('/admin') }}">
            <i class="fa fa-dashboard fa-lg fa-fw"></i> &nbsp;<span> {{ trans('backend.dashboard') }} </span>
          </a>
        </li>


        <!-- Users -->
        @if( auth()->guard('admin')->user()->type == 1 )
          <li class="{{ Route::currentRouteName() == 'admin.admins.index' ? 'active' : '' }}">
            <a href="{{ route('admin.admins.index') }}">
              <i class="fa fa-user-plus fa-lg fa-fw"></i> &nbsp;
              <span>{{ trans('backend.admins') }}</span>
            </a>
          </li>
        @endif

        

        <!-- Testsssssss -->
        <li class="">
          <a href="{{ route('test.index') }}">
            <i class="fa fa-users fa-lg fa-fw"></i> &nbsp;
            <span>Test</span>
          </a>
        </li>

        <!-- Users -->
        <li class="{{ Route::currentRouteName() == 'user.index' ? 'active' : '' }}">
          <a href="{{ route('user.index') }}">
            <i class="fa fa-users fa-lg fa-fw"></i> &nbsp;
            <span>{{ trans('backend.clients') }}</span>
          </a>
        </li>


        <!-- Categories -->
        <li class="{{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}">
          <a href="{{ route('category.index') }}">
            <i class="fa fa-tags fa-lg fa-fw"></i>  &nbsp;<span>{{ trans('backend.categories') }}</span>
          </a>
        </li>


        <!-- Foods / Drinks  -->
        <li class="{{ Route::currentRouteName() == 'food.index' ? 'active' : '' }}">
          <a href="{{ route('food.index') }}">
            <i class="fa fa-cutlery fa-lg fa-fw"></i> &nbsp; <span>{{ trans('backend.foods') }}</span>
          </a>
        </li>


         <!-- Orders -->
         <li class="{{ Route::currentRouteName() == 'order.index' || Route::currentRouteName() == 'order.show'  ? 'active' : '' }}">
          <a href="{{ route('order.index') }}">
            <i class="fa fa-shopping-cart fa-lg fa-fw"></i> &nbsp; <span> {{ trans('backend.orders') }} </span>
          </a>
        </li>


         <!-- Comments -->
         <li class="{{ Route::currentRouteName() == 'comment.index' ? 'active' : '' }}">
          <a href="{{ route('comment.index') }}">
            <i class="fa fa-comments fa-lg fa-fw"></i> &nbsp; <span> {{ trans('backend.comments') }} </span>
          </a>
        </li>




         <!-- Messages -->
         <li class="{{ Route::currentRouteName() == 'message.index' || Route::currentRouteName() == 'message.show' ? 'active' : '' }}">
          <a href="{{ route('message.index') }}">
            <i class="fa fa-envelope-o fa-lg fa-fw"></i> &nbsp; <span> {{ trans('backend.messages') }} </span>
          </a>
        </li>


         <!-- Sliders -->
         <li class="{{ Route::currentRouteName() == 'slider.index' ? 'active' : '' }}">
          <a href="{{ route('slider.index') }}">
            <i class="fa fa-sliders fa-lg fa-fw"></i> &nbsp; <span> {{ trans('backend.sliders') }} </span>
          </a>
        </li>

   
         <!-- Settings -->
         <li class="{{ Route::currentRouteName() == 'setting.index' ? 'active' : '' }}">
          <a href="{{ route('setting.index') }}">
            <i class="fa fa-cogs fa-lg fa-fw"></i> &nbsp; <span> {{ trans('backend.settings') }} </span>
          </a>
        </li>


                 <!-- Settings -->
         <li class="{{ Route::currentRouteName() == '' ? 'active' : '' }}">
          <a href="{{ url('/') }}" target="_blank">
            <i class="fa fa-flag fa-lg fa-fw"></i> &nbsp; <span> {{ trans('backend.mainwebsite') }} </span>
          </a>
        </li>














      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
