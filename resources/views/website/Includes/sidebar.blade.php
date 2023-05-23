<nav class="sidebar sidebar-offcanvas bg-light shadow" id="sidebar">
  <ul class="nav mx-md-2 mx-0">
    <li class="nav-item">
      <a class="nav-link" href="{{url('/dashboard')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    @if(Session::get('userrole') == 'admin')
    <li class="nav-item">
      <a class="nav-link" href="{{url('/users')}}">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">All Users</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/assign-supervisor')}}">
        <i class="mdi mdi-plus-circle menu-icon"></i>
        <span class="menu-title">Assign supervisor</span>
      </a>
    </li>
    @endif
  <!-- the list for supervisor + admin  || Session::get('userrole') == 'admin'-->
    @if(Session::get('userrole') == 'supervisor')
    <li class="nav-item">
      <a class="nav-link" href="{{url('/managetask')}}">
        <i class="mdi mdi-view-grid menu-icon"></i>
        <span class="menu-title">Manage Task</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/assign-task')}}">
        <i class="mdi mdi-note-plus menu-icon"></i>
        <span class="menu-title">Assign Task</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/groups')}}">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">Existing Group</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/create-group')}}">
        <i class="mdi mdi-account-multiple-plus menu-icon"></i>
        <span class="menu-title">Create Group</span>
      </a>
    </li>
    @endif
    <!-- the list for student + admin || Session::get('userrole') == 'admin'-->
    @if(Session::get('userrole') == 'student' )
    <li class="nav-item">
      <a class="nav-link" href="{{url('/group-task')}}">
        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
        <span class="menu-title">Group Task</span>
      </a>
    </li>
    @endif
  </ul>
</nav>