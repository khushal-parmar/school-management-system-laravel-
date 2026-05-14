<div class="tab-pane fade" id="add-sub">
    <div class="col-md-10 offset-md-1">
        <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header bg-indigo-800 text-white p-3">
                <h6 class="mb-0 font-weight-bold"><i class="icon-plus-circle2 mr-2"></i> Add Subject to Timetable</h6>
            </div>
            
            <div class="card-body p-4 bg-light">
                <form class="ajax-store" method="post" action="{{ route('tt.store') }}">
                    @csrf 
                    <input name="ttr_id" value="{{ $ttr->id }}" type="hidden">

                    <div class="row">
                        {{-- DATE or DAY SECTION --}}
                        <div class="col-md-12 mb-3">
                            @if($ttr->exam_id)
                                <div class="form-group">
                                    <label class="font-weight-bold text-slate-700">Exam Date <span class="text-danger">*</span></label>
                                    <div class="input-group shadow-sm" style="border-radius: 10px; overflow: hidden;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0"><i class="icon-calendar3 text-indigo"></i></span>
                                        </div>
                                        <input autocomplete="off" name="exam_date" value="{{ old('exam_date') }}" required type="text" class="form-control date-pick border-left-0" placeholder="Select Date...">
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="day" class="font-weight-bold text-slate-700">Select Day <span class="text-danger">*</span></label>
                                    <select id="day" name="day" required class="form-control select rounded-pill shadow-sm" data-placeholder="Choose Day...">
                                        <option value=""></option>
                                        @foreach(Qs::getDaysOfTheWeek() as $dw)
                                            <option {{ old('day') == $dw ? 'selected' : '' }} value="{{ $dw }}">{{ $dw }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </div>

                        {{-- SUBJECT SECTION --}}
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="subject_id" class="font-weight-bold text-slate-700">Subject <span class="text-danger">*</span></label>
                                <select required data-placeholder="Select Subject" class="form-control select-search rounded-pill shadow-sm" name="subject_id" id="subject_id">
                                    <option value=""></option>
                                    @foreach($subjects as $sub)
                                        <option {{ old('subject_id') == $sub->id ? 'selected' : '' }} value="{{ $sub->id }}">{{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- TIME SLOT SECTION --}}
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="ts_id" class="font-weight-bold text-slate-700">Time Slot <span class="text-danger">*</span></label>
                                <select data-placeholder="Select Time..." required class="select form-control rounded-pill shadow-sm" name="ts_id" id="ts_id">
                                    <option value=""></option>
                                    @foreach($time_slots as $tms)
                                        <option {{ old('ts_id') == $tms->id ? 'selected' : '' }} value="{{ $tms->id }}">{{ $tms->full }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-indigo rounded-pill px-4 shadow">
                            Save Entry <i class="icon-paperplane ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>