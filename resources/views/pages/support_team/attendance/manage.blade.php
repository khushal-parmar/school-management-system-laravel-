@extends('layouts.master')
@section('content')

@php
    $user_role = Auth::user()->user_type;
    $has_data = $attendance->count() > 0;
    
    // લોજિક: જો ડેટા હોય અને યુઝર ટીચર હોય, તો જ લૉક કરવું.
    // એડમિન કે સુપર એડમિન માટે ક્યારેય લૉક નહીં થાય.
    $is_locked = ($has_data && $user_role == 'teacher');
@endphp

<div class="card">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title text-primary font-weight-bold">
            Attendance for Class: {{ $class_id }} | Date: {{ date('d-M-Y', strtotime($date)) }}
        </h6>
        @if($has_data)
            @if($user_role == 'teacher')
                <span class="badge badge-danger">LOCKED - Submitted</span>
            @else
                <span class="badge badge-warning">EDIT MODE - Admin Access</span>
            @endif
        @endif
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('attendance.store') }}">
            @csrf
            <input type="hidden" name="my_class_id" value="{{ $class_id }}">
            <input type="hidden" name="att_date" value="{{ $date }}">

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="bg-light">
                            <th>#</th>
                            <th>Student Name</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->user->name }}</td>
                            <td class="text-center">
                                @php
                                    $existing = $attendance->where('student_id', $s->user_id)->first();
                                @endphp

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="p-{{ $s->user_id }}" name="attendance[{{ $s->user_id }}]" value="P" class="custom-control-input" required 
                                    {{ ($existing && $existing->status == 'P') ? 'checked' : '' }} 
                                    {{ $is_locked ? 'disabled' : '' }}>
                                    <label class="custom-control-label text-success" for="p-{{ $s->user_id }}">Present</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="a-{{ $s->user_id }}" name="attendance[{{ $s->user_id }}]" value="A" class="custom-control-input" 
                                    {{ ($existing && $existing->status == 'A') ? 'checked' : '' }} 
                                    {{ $is_locked ? 'disabled' : '' }}>
                                    <label class="custom-control-label text-danger" for="a-{{ $s->user_id }}">Absent</label>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- બટન લોજિક --}}
            @if(!$is_locked)
                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">
                        {{ $has_data ? 'Update Attendance' : 'Submit Attendance' }}
                    </button>
                </div>
            @else
                <div class="alert alert-info mt-3 text-center">
                    Attendance record is locked for teachers. Please contact Admin for changes.
                </div>
            @endif
        </form>
    </div>
</div>

@endsection