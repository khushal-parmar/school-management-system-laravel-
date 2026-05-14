@extends('layouts.master')
@section('page_title', 'Manage Books')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-bold"><i class="icon-books mr-2"></i> Books List</h6>
            <div class="header-elements">
                {{-- નવું પુસ્તક ઉમેરવા માટેનું બટન --}}
                <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm font-weight-bold">
                    <i class="icon-plus3 mr-1"></i> Add New Book
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table datatable-button-html5-columns table-bordered table-striped">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Class</th>
                            <th>Location</th>
                            <th>Total Copies</th>
                            <th>Issued</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $b)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-left font-weight-semibold">{{ $b->name }}</td>
                                <td>{{ $b->author }}</td>
                                <td>{{ $b->class_name ?? 'General' }}</td>
                                <td><span class="badge badge-secondary">{{ $b->location ?? 'N/A' }}</span></td>
                                <td class="font-weight-bold text-blue">{{ $b->total_copies }}</td>
                                <td class="text-danger">{{ $b->issued_copies }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                {{-- Edit બટન --}}
                                                <a href="{{ route('books.edit', $b->id) }}" class="dropdown-item"><i
                                                        class="icon-pencil7"></i> Edit</a>

                                                {{-- Delete બટન --}}
                                                <form id="item-delete-{{ $b->id }}"
                                                    action="{{ route('books.destroy', $b->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a id="{{ $b->id }}" onclick="confirmDelete(this.id)" href="#"
                                                    class="btn btn-sm btn-danger" title="Delete"><i class="icon-trash"></i>
                                                    Delete</a>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-4">
                                    <p class="text-muted">કોઈ પુસ્તકો મળ્યા નથી. નવું પુસ્તક ઉમેરો.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Delete માટે નાનકડું સ્ક્રિપ્ટ --}}
    <script>
        function confirmDelete(element) {
            if (confirm('શું તમે ખરેખર આ પુસ્તક કાઢી નાખવા માંગો છો?')) {
                $(element).prev('form').submit();
            }
        }
    </script>

@endsection
