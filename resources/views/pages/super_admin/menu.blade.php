{{--Manage Settings--}}
<li class="nav-item">
    <a href="{{ route('settings') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['settings',]) ? 'active' : '' }}"><i class="icon-gear"></i> <span>Settings</span></a>
</li>
 {{-- Attendance Link --}}
<li class="nav-item">
    <a href="{{ route('attendance.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['attendance.index', 'attendance.admin.manage', 'attendance.teacher.manage', 'attendance.student.view']) ? 'active' : '' }}">
        <i class="icon-calendar"></i> 
        <span>Attendance</span>
    </a>
</li>