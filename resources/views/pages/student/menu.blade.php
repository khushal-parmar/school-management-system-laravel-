{{--Marksheet--}}
<li class="nav-item">
    <a href="{{ route('marks.year_select', Qs::hash(Auth::user()->id)) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.show', 'marks.year_selector', 'pins.enter']) ? 'active' : '' }}">
        <i class="icon-file-text2"></i> Marksheet {{-- Marksheet માટે ફાઈલ જેવો આઈકોન --}}
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('my_fees') }}" class="nav-link">
        <i class="icon-cash3"></i> <span>My Fees</span>
    </a>
</li>

{{-- Library Books --}}
<li class="nav-item">
    <a href="{{ route('student.books.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['student.books.index']) ? 'active' : '' }}">
        <i class="icon-books"></i> <span>Library Books</span> {{-- ઘણી બધી બુક્સનો આઈકોન --}}
    </a>
</li>

{{-- My Issued Books --}}
<li class="nav-item">
    <a href="{{ route('student.books.my_books') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['student.books.my_books']) ? 'active' : '' }}">
        <i class="icon-book"></i> <span>My Books</span> {{-- સિંગલ બુકનો આઈકોન --}}
    </a>
</li>