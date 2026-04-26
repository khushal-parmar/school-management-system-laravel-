@extends('layouts.master')
@section('page_title', 'My Issued Books')
@section('content')
<div class="card">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($requests as $r)
                <tr>
                    <td>{{ $r->book_name }}</td>
                    <td>{{ date('d-m-Y', strtotime($r->start_date)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($r->end_date)) }}</td>
                    <td>
                        <span class="badge badge-{{ $r->status == 'issued' ? 'warning' : 'success' }}">
                            {{ ucfirst($r->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">તમારી પાસે અત્યારે કોઈ ઈશ્યૂ થયેલી બુક નથી.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection