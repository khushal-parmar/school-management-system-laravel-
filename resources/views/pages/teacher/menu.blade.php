{{-- Attendance Link --}}
<li class="nav-item">
    <a href="{{ route('attendance.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['attendance.index', 'attendance.admin.manage', 'attendance.teacher.manage', 'attendance.student.view']) ? 'active' : '' }}">
        <i class="icon-calendar"></i> 
        <span>Attendance</span>
    </a>
</li>