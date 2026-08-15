<style>
    /* Modern Custom Sidebar Styling */
    .sidebar-custom-modern {
        background: linear-gradient(180deg, #1e1e2d 0%, #151521 100%) !important;
        border-right: 1px solid rgba(255, 255, 255, 0.05);
        font-family: 'Inter', 'Nunito', sans-serif;
        box-shadow: 4px 0 25px rgba(0, 0, 0, 0.15);
    }

    /* User Profile Section */
    .sidebar-user-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        margin: 15px;
        padding: 12px;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .sidebar-user-card:hover {
        background: rgba(255, 255, 255, 0.06);
        border-color: rgba(255, 255, 255, 0.15);
    }

    .user-avatar-glow {
        box-shadow: 0 0 12px rgba(99, 102, 241, 0.4);
        border: 2px solid #6366f1;
    }

    /* Navigation Items */
    .nav-sidebar .nav-item .nav-link {
        color: #a2a3b7;
        font-weight: 500;
        font-size: 0.92rem;
        padding: 10px 18px;
        border-radius: 10px;
        margin: 3px 12px;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
    }

    .nav-sidebar .nav-item .nav-link i {
        font-size: 1.15rem;
        margin-right: 12px;
        color: #6c7293;
        transition: color 0.25s ease;
    }

    /* Hover State */
    .nav-sidebar .nav-item .nav-link:hover {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.05);
        transform: translateX(4px);
    }

    .nav-sidebar .nav-item .nav-link:hover i {
        color: #818cf8;
    }

    /* Active State */
    .nav-sidebar .nav-item .nav-link.active {
        color: #ffffff !important;
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%) !important;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
        font-weight: 600;
    }

    .nav-sidebar .nav-item .nav-link.active i {
        color: #ffffff !important;
    }

    /* Submenu Styling */
    .nav-group-sub {
        background: rgba(0, 0, 0, 0.15) !important;
        border-radius: 10px;
        margin: 4px 12px !important;
        padding: 6px 0 !important;
    }

    .nav-group-sub .nav-link {
        margin: 2px 8px !important;
        font-size: 0.86rem !important;
        padding: 8px 14px !important;
    }

    /* Logout Special Styling */
    .nav-link-logout {
        color: #f87171 !important;
        background: rgba(239, 68, 68, 0.08) !important;
        border: 1px solid rgba(239, 68, 68, 0.15);
        margin-top: 15px !important;
    }

    .nav-link-logout:hover {
        background: rgba(239, 68, 68, 0.2) !important;
        color: #ef4444 !important;
    }

    .nav-link-logout i {
        color: #f87171 !important;
    }
</style>

<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md sidebar-custom-modern">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        <span class="font-weight-semibold text-uppercase tracking-wider">Navigation</span>
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-card">
            <div class="media align-items-center">
                <div class="mr-3 position-relative">
                    <a href="{{ route('my_account') }}">
                        <img src="{{ Auth::user()->photo }}" width="42" height="42" class="rounded-circle user-avatar-glow" alt="photo">
                    </a>
                </div>

                <div class="media-body">
                    <div class="media-title font-weight-bold text-white mb-0" style="font-size: 0.95rem;">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="font-size-xs text-muted d-flex align-items-center mt-1" style="color: #9ca3af !important;">
                        <i class="icon-user font-size-sm mr-1 text-primary"></i>
                        <span>{{ ucwords(str_replace('_', ' ', Auth::user()->user_type)) }}</span>
                    </div>
                </div>

                <div class="ml-2">
                    <a href="{{ route('my_account') }}" class="text-muted hover-white" title="Account Settings">
                        <i class="icon-cog3 font-size-base"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile bg-transparent border-0 shadow-0">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ (Route::is('dashboard')) ? 'active' : '' }}">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{--Academics--}}
                @if(Qs::userIsAcademic())
                    <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['tt.index', 'ttr.edit', 'ttr.show', 'ttr.manage']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                        <a href="#" class="nav-link"><i class="icon-graduation2"></i> <span> Academics</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Manage Academics">
                            <li class="nav-item">
                                <a href="{{ route('tt.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['tt.index']) ? 'active' : '' }}">Timetables</a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{--Administrative--}}
                @if(Qs::userIsAdministrative())
                    <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.create', 'payments.invoice', 'payments.receipts', 'payments.edit', 'payments.manage', 'payments.show',]) ? 'nav-item-expanded nav-item-open' : '' }} ">
                        <a href="#" class="nav-link"><i class="icon-office"></i> <span> Administrative</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Administrative">
                            @if(Qs::userIsTeamAccount())
                                <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.create', 'payments.edit', 'payments.manage', 'payments.show', 'payments.invoice']) ? 'nav-item-expanded' : '' }}">
                                    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.edit', 'payments.create', 'payments.manage', 'payments.show', 'payments.invoice']) ? 'active' : '' }}">Payments</a>
                                    <ul class="nav nav-group-sub">
                                        <li class="nav-item"><a href="{{ route('payments.create') }}" class="nav-link {{ Route::is('payments.create') ? 'active' : '' }}">Create Payment</a></li>
                                        <li class="nav-item"><a href="{{ route('payments.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.edit', 'payments.show']) ? 'active' : '' }}">Manage Payments</a></li>
                                        <li class="nav-item"><a href="{{ route('payments.manage') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['payments.manage', 'payments.invoice', 'payments.receipts']) ? 'active' : '' }}">Student Payments</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                {{--Manage Students--}}
                @if(Qs::userIsTeamSAT())
                    <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.create', 'students.list', 'students.edit', 'students.show', 'students.promotion', 'students.promotion_manage', 'students.graduated']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                        <a href="#" class="nav-link"><i class="icon-users"></i> <span> Students</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Manage Students">
                            @if(Qs::userIsTeamSA())
                                <li class="nav-item">
                                    <a href="{{ route('students.create') }}" class="nav-link {{ (Route::is('students.create')) ? 'active' : '' }}">Admit Student</a>
                                </li>
                            @endif

                            <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.list', 'students.edit', 'students.show']) ? 'nav-item-expanded' : '' }}">
                                <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['students.list', 'students.edit', 'students.show']) ? 'active' : '' }}">Student Information</a>
                                <ul class="nav nav-group-sub">
                                    @foreach(App\Models\MyClass::orderBy('name')->get() as $c)
                                        <li class="nav-item"><a href="{{ route('students.list', $c->id) }}" class="nav-link">{{ $c->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            @if(Qs::userIsTeamSA())
                                <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.promotion', 'students.promotion_manage']) ? 'nav-item-expanded' : '' }}">
                                    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion', 'students.promotion_manage' ]) ? 'active' : '' }}">Student Promotion</a>
                                    <ul class="nav nav-group-sub">
                                        <li class="nav-item"><a href="{{ route('students.promotion') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion']) ? 'active' : '' }}">Promote Students</a></li>
                                        <li class="nav-item"><a href="{{ route('students.promotion_manage') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion_manage']) ? 'active' : '' }}">Manage Promotions</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('students.graduated') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.graduated' ]) ? 'active' : '' }}">Students Graduated</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(Qs::userIsTeamSA())
                    {{--Manage Users--}}
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['users.index', 'users.show', 'users.edit']) ? 'active' : '' }}"><i class="icon-users4"></i> <span> Users</span></a>
                    </li>

                    {{--Manage Classes--}}
                    <li class="nav-item">
                        <a href="{{ route('classes.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['classes.index','classes.edit']) ? 'active' : '' }}"><i class="icon-windows2"></i> <span> Classes</span></a>
                    </li>

                    {{--Manage Dorms--}}
                    <li class="nav-item">
                        <a href="{{ route('dorms.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['dorms.index','dorms.edit']) ? 'active' : '' }}"><i class="icon-home9"></i> <span> Dormitories</span></a>
                    </li>

                    {{--Manage Sections--}}
                    <li class="nav-item">
                        <a href="{{ route('sections.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['sections.index','sections.edit',]) ? 'active' : '' }}"><i class="icon-fence"></i> <span>Sections</span></a>
                    </li>

                    {{--Manage Subjects--}}
                    <li class="nav-item">
                        <a href="{{ route('subjects.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['subjects.index','subjects.edit',]) ? 'active' : '' }}"><i class="icon-pin"></i> <span>Subjects</span></a>
                    </li>
                @endif

                {{--Exams--}}
                @if(Qs::userIsTeamSAT())
                    <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['exams.index', 'exams.edit', 'grades.index', 'grades.edit', 'marks.index', 'marks.manage', 'marks.bulk', 'marks.tabulation', 'marks.show', 'marks.batch_fix',]) ? 'nav-item-expanded nav-item-open' : '' }} ">
                        <a href="#" class="nav-link"><i class="icon-books"></i> <span> Exams</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Manage Exams">
                            @if(Qs::userIsTeamSA())
                                <li class="nav-item">
                                    <a href="{{ route('exams.index') }}" class="nav-link {{ (Route::is('exams.index')) ? 'active' : '' }}">Exam List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('grades.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['grades.index', 'grades.edit']) ? 'active' : '' }}">Grades</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('marks.tabulation') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.tabulation']) ? 'active' : '' }}">Tabulation Sheet</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('marks.batch_fix') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.batch_fix']) ? 'active' : '' }}">Batch Fix</a>
                                </li>
                            @endif

                            @if(Qs::userIsTeamSAT())
                                <li class="nav-item">
                                    <a href="{{ route('marks.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.index']) ? 'active' : '' }}">Marks</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('marks.bulk') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.bulk', 'marks.show']) ? 'active' : '' }}">Marksheet</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @include('pages.'.Qs::getUserType().'.menu')

                {{--Manage Account--}}
                <li class="nav-item">
                    <a href="{{ route('my_account') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['my_account']) ? 'active' : '' }}"><i class="icon-user"></i> <span>My Account</span></a>
                </li>

                {{--Logout--}}
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link nav-link-logout">
                        <i class="icon-switch2"></i> <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>