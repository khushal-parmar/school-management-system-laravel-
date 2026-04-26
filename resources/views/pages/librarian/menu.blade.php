{{--Books--}}
<li class="nav-item">
    <a href="{{ route('books.index') }}" class="nav-link">
        <i class="icon-books"></i> <span>Manage Books</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('book_requests.create') }}" class="nav-link">
        <i class="icon-plus-circle2"></i> <span>Issue a Book</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('book_requests.index') }}" class="nav-link">
        <i class="icon-list"></i> <span>Issued Books List</span>
    </a>
</li>