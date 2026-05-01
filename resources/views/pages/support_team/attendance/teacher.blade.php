@extends('layouts.master')
@section('page_title', 'Teacher - Mark Attendance')
@section('content')

<div class="card">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title text-success font-weight-bold">My Assigned Sections</h6>
    </div>

    <div class="card-body">
        {{-- જો ટીચર પાસે સેક્શન એસાઈન કરેલા હોય તો જ ફોર્મ બતાવવું --}}
        @if(isset($teacher_sections) && $teacher_sections->count() > 0)
            <form method="POST" action="{{ route('attendance.select') }}">
                @csrf
                <div class="row">
                    {{-- Section Selection --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="section_id" class="font-weight-bold">Select Class & Section:</label>
                            <select required name="section_id" id="section_id" class="form-control select-search" onchange="updateClassId(this)">
                                <option value="">--- Choose Your Section ---</option>
                                @foreach($teacher_sections as $ts)
                                    {{-- ડેટા એટ્રિબ્યુટમાં class_id સેવ કર્યો છે જેથી JS થી પકડી શકાય --}}
                                    <option value="{{ $ts->id }}" data-class="{{ $ts->my_class_id }}">
                                        {{ $ts->my_class->name }} - {{ $ts->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Date Selection --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date" class="font-weight-bold">Date:</label>
                            <input name="date" value="{{ date('Y-m-d') }}" type="date" class="form-control" required>
                        </div>
                    </div>

                    {{-- Hidden Class ID --}}
                    <input type="hidden" name="my_class_id" id="hidden_class_id">

                    {{-- Submit Button --}}
                    <div class="col-md-3">
                        <div class="form-group" style="margin-top: 27px;">
                            <button type="submit" class="btn btn-success btn-block">
                                Manage Attendance <i class="icon-arrow-right14 ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        @else
            <div class="alert alert-danger border-0 alert-dismissible text-center">
                <span class="font-weight-semibold">No Sections Found!</span> You are not assigned as a Class Teacher to any section. Please contact the Admin.
            </div>
        @endif
    </div>
</div>

{{-- JavaScript: સેક્શન સિલેક્ટ થાય ત્યારે ઓટોમેટિક ક્લાસ આઈડી સેટ કરવા માટે --}}
<script>
    function updateClassId(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var classId = selectedOption.getAttribute('data-class');
        document.getElementById('hidden_class_id').value = classId;
    }
</script>

@endsection