@extends('layouts.master')
@section('page_title', 'Add New Book')
@section('content')

<div class="card">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title font-weight-bold">Add New Book to Library</h6>
    </div>

    <div class="card-body">
        <form method="post" action="{{ route('books.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Book Name: <span class="text-danger">*</span></label>
                        <input value="{{ old('name') }}" required name="name" type="text" class="form-control" placeholder="e.g. Science Part 1">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Author Name:</label>
                        <input value="{{ old('author') }}" name="author" type="text" class="form-control" placeholder="e.g. J.K. Rowling">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="my_class_id">Class: (Optional)</label>
                        <select name="my_class_id" id="my_class_id" class="form-control select-search">
                            <option value="">General / All Classes</option>
                            @foreach($my_classes as $c)
                                <option {{ old('my_class_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Location / Shelf:</label>
                        <input value="{{ old('location') }}" name="location" type="text" class="form-control" placeholder="e.g. Shelf A-10">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Total Copies: <span class="text-danger">*</span></label>
                        <input value="{{ old('total_copies') }}" required name="total_copies" type="number" min="1" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit Form <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </div>
</div>

@endsection