<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/img/user.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <li class="{{ Route::is('tag.*') ? 'active' : '' }} treeview">
        <a href="{{ route('tag.index')}}">
          <i class="fa fa-tags"></i> <span>Tags</span>
        </a>
      </li>
      <li class="{{ Route::is('group.*') ? 'active' : '' }} treeview">
        <a href="{{ route('group.index')}}">
          <i class="fa fa-users"></i> <span>Groups</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>