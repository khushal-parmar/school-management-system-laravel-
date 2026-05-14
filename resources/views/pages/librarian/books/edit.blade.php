@extends('layouts.master')
@section('page_title', 'Edit Book: '.$book->name)
@section('content')

<div class="card">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title font-weight-bold">Edit Book Details</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        {{-- Update કરવા માટે મેથડ PUT અથવા PATCH વાપરવી પડે --}}
        <form method="post" action="{{ route('books.update', $book->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Book Name: <span class="text-danger">*</span></label>
                        <input value="{{ $book->name }}" required name="name" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Author Name:</label>
                        <input value="{{ $book->author }}" name="author" type="text" class="form-control">
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
                                <option {{ $book->my_class_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Location / Shelf:</label>
                        <input value="{{ $book->location }}" name="location" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Total Copies: <span class="text-danger">*</span></label>
                        <input value="{{ $book->total_copies }}" required name="total_copies" type="number" min="1" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" class="form-control" rows="3">{{ $book->description }}</textarea>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Update Book <i class="icon-paperplane ml-2"></i></button>
                <a href="{{ route('books.index') }}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection