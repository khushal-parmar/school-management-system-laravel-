@extends('layouts.master')
@section('page_title', 'System Settings')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Update System Settings</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <form enctype="multipart/form-data" method="post" action="{{ route('settings.update') }}">
                @csrf @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        {{-- System Name --}}
                        <div class="form-group">
                            <label>System Name: <span class="text-danger">*</span></label>
                            <input name="system_name" value="{{ $s['system_name'] ?? '' }}" required type="text" class="form-control" placeholder="System Name">
                        </div>

                        {{-- System Title --}}
                        <div class="form-group">
                            <label>System Title:</label>
                            <input name="system_title" value="{{ $s['system_title'] ?? '' }}" type="text" class="form-control" placeholder="System Title">
                        </div>

                        {{-- System Email --}}
                        <div class="form-group">
                            <label>System Email:</label>
                            <input name="system_email" value="{{ $s['system_email'] ?? '' }}" type="email" class="form-control" placeholder="Email">
                        </div>

                        {{-- Phone --}}
                        <div class="form-group">
                            <label>Phone:</label>
                            <input name="phone" value="{{ $s['phone'] ?? '' }}" type="text" class="form-control" placeholder="Phone">
                        </div>

                        {{-- Address --}}
                        <div class="form-group">
                            <label>Address:</label>
                            <input name="address" value="{{ $s['address'] ?? '' }}" type="text" class="form-control" placeholder="Address">
                        </div>
                    </div>

                    <div class="col-md-6">
                        {{-- Current Session --}}
                        <div class="form-group">
                            <label>Current Session:</label>
                            <input name="current_session" value="{{ $s['current_session'] ?? '' }}" type="text" class="form-control" placeholder="e.g. 2025-2026">
                        </div>

                        {{-- Next Term Fees --}}
                        <div class="form-group">
                            <label>Next Term Fees (Local):</label>
                            <input name="next_term_fees_l" value="{{ $s['next_term_fees_l'] ?? '' }}" type="number" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Next Term Fees (Foreign):</label>
                            <input name="next_term_fees_f" value="{{ $s['next_term_fees_f'] ?? '' }}" type="number" class="form-control">
                        </div>

                        {{-- Lock Exam Field (Error Fixed here) --}}
                        <div class="form-group">
                            <label class="font-weight-semibold">Lock Exam:</label>
                            <div class="form-check form-check-switchery">
                                <label class="form-check-label">
                                    {{-- Hidden field ensures a value is always sent --}}
                                    <input type="hidden" name="lock_exam" value="0">
                                    <input name="lock_exam" value="1" {{ ($s['lock_exam'] ?? 0) == 1 ? 'checked' : '' }} type="checkbox" class="form-input-switchery">
                                    <span class="ml-2">Yes (Prevents marking after exams are over)</span>
                                </label>
                            </div>
                        </div>

                        {{-- Logo Upload --}}
                        <div class="form-group">
                            <label class="d-block">Upload Logo:</label>
                            <input name="logo" accept="image/*" type="file" class="form-input-styled" data-fouc>
                            <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                            @if(isset($s['logo']))
                                <img src="{{ $s['logo'] }}" alt="Logo" width="100" class="mt-2 border p-1">
                            @endif
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    {{-- Term Ends & Begins --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Term Ends:</label>
                            <input name="term_ends" value="{{ $s['term_ends'] ?? '' }}" type="text" class="form-control datepicker" placeholder="Select Date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Next Term Begins:</label>
                            <input name="term_begins" value="{{ $s['term_begins'] ?? '' }}" type="text" class="form-control datepicker" placeholder="Select Date">
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Update Settings <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>

@endsection