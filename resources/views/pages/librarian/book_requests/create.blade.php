 @extends('layouts.master')
@section('page_title', 'Issue New Book')

@section('content')
<div class="card">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title font-weight-bold">
            <i class="icon-plus-circle2 mr-2"></i> Issue New Book to Student
        </h6>
    </div>

    <div class="card-body">
        <form method="post" action="{{ route('book_requests.store') }}">
            @csrf
            
            <div class="row">
                {{-- Select Student --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Select Student: <span class="text-danger">*</span></label>
                        <select name="user_id" class="form-control select-search" required>
                            <option value="">--- Choose Student ---</option>
                            @foreach($students as $s)
                                <option value="{{ $s->id }}">{{ $s->name }} ({{ $s->user_type }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Select Book --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Select Book: <span class="text-danger">*</span></label>
                        <select name="book_id" class="form-control select-search" required>
                            <option value="">--- Choose Book ---</option>
                            @forelse($books as $b)
                                <option value="{{ $b->id }}">
                                    {{ $b->name }} (Available: {{ $b->total_copies - ($b->issued_copies ?? 0) }})
                                </option>
                            @empty
                                <option value="">No Books Available in Stock</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                {{-- Issue Date --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Issue Date:</label>
                        <input type="date" name="start_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>

                {{-- Return Date --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Return Date (Deadline):</label>
                        <input type="date" name="end_date" class="form-control" value="{{ date('Y-m-d', strtotime('+7 days')) }}" required>
                    </div>
                </div>
            </div>

            <hr>

            <div class="text-right">
                <button type="submit" class="btn btn-success font-weight-bold">
                    Issue Book <i class="icon-paperplane ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- જો લિસ્ટ હજુ પણ blank દેખાય, તો આ નાનકડી સ્ક્રિપ્ટ Select2 ને જબરદસ્તી લોડ કરશે --}}
<script>
    $(document).ready(function() {
        if ($('.select-search').length > 0) {
            $('.select-search').select2();
        }
    });
</script>

@endsection