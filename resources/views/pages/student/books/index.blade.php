@extends('layouts.master')
@section('page_title', 'Library Books')
@section('content')
<div class="row">
    @foreach($books as $b)
    <div class="col-md-3">
        <div class="card card-body text-center shadow">
            <i class="icon-books icon-3x text-success mb-2"></i>
            <h6 class="font-weight-bold mb-0">{{ $b->name }}</h6>
            <small class="text-muted">By: {{ $b->author }}</small>
            <hr>
            <span class="badge badge-flat border-success text-success-600">
                Stock: {{ $b->total_copies - ($b->issued_copies ?? 0) }}
            </span>
        </div>
    </div>
    @endforeach
</div>
@endsection