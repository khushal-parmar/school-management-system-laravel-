@extends('layouts.master')
@section('page_title', 'Manage Attendance')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Select Class and Date for Attendance</h6>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('attendance.select') }}">
            @csrf
            <div class="row">
                {{-- Class Selection --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="my_class_id" class="font-weight-bold">Select Class:</label>
                        <select required name="my_class_id" id="my_class_id" class="form-control select-search">
                            <option value="">Choose Class</option>
                            @foreach($my_classes as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Date Selection --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date" class="font-weight-bold">Date:</label>
                        <input name="date" value="{{ date('Y-m-d') }}" type="date" class="form-control" required>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="col-md-4">
                    <div class="form-group" style="margin-top: 27px;">
                        <button type="submit" class="btn btn-primary">Manage Attendance <i class="icon-arrow-right14 ml-2"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection