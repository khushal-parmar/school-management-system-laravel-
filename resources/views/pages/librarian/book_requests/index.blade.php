 @extends('layouts.master')
@section('content')
<div class="card">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Student Name</th>
                    <th>Book Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($requests as $r)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ \App\User::find($r->user_id)->name ?? 'N/A' }}</td>
    <td>{{ DB::table('books')->where('id', $r->book_id)->value('name') }}</td>
    <td>
        @if($r->status == 'issued')
            <span class="badge badge-warning">Issued</span>
        @else
            <span class="badge badge-success">Returned</span>
        @endif
    </td>
    <td>
        @if($r->status == 'issued')
           <a href="{{ route('book_requests.return', ['id' => $r->id]) }}" 
   onclick="return confirm('Are you sure?')" 
   class="btn btn-sm btn-success">
   Return Now
</a>
        @else
            <button class="btn btn-sm btn-light" disabled>Done</button>
        @endif
    </td>
</tr>
@endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection