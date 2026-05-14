{{-- My Children (તમારો હાલનો કોડ) --}}
<li class="nav-item">
    <a href="{{ route('my_children') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['my_children']) ? 'active' : '' }}"><i class="icon-users4"></i> <span>My Children</span></a>
</li>

{{-- Fees / Payments --}}
<li class="nav-item">
    <a href="{{ route('payments.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.invoice']) ? 'active' : '' }}">
        <i class="icon-cash3"></i> <span>Fees / Payments</span>
    </a>
</li>

{{-- Attendance --}}
<li class="nav-item">
    <a href="{{ route('attendance.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['attendance.index']) ? 'active' : '' }}">
        <i class="icon-alarm"></i> <span>Attendance</span>
    </a>
</li>