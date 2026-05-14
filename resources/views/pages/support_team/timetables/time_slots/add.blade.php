<div class="row">
    {{-- Modern Info Alert --}}
    <div class="col-md-12">
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px; background: linear-gradient(to right, #f5f3ff, #ede9fe); border-left: 5px solid #8b5cf6 !important;">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <div class="mr-3 shadow-sm" style="background: #8b5cf6; color: #fff; padding: 10px; border-radius: 10px;">
                        <i class="icon-info22"></i>
                    </div>
                    <div>
                        <span class="text-indigo-800 font-weight-semibold d-block" style="font-size: 15px;">Smart Time-Slot Manager</span>
                        <span class="text-muted font-size-sm">
                            You can <strong>Add New Slots</strong> or <strong>Import</strong> from another timetable. 
                            <span class="text-danger-800 font-weight-bold ml-1">Note:</span> Using existing slots will reset current records.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Create New Slots Card --}}
    <div class="col-md-6">
        <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header header-elements-inline" style="background: #ef4444; color: white;">
                <h6 class="font-weight-bold card-title"><i class="icon-alarm mr-2"></i> Add New Time Slots</h6>
                {!! Qs::getPanelOptions() !!}
            </div>

            <div class="card-body bg-white p-4">
                <form data-reload="#time_slots_table" class="ajax-store" method="post" action="{{ route('ts.store') }}">
                    @csrf
                    <input name="ttr_id" value="{{ $ttr->id }}" type="hidden">

                    {{-- START TIME --}}
                    <div class="form-group">
                        <label class="font-weight-semibold text-slate-700">Start Time <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-4">
                                <select data-placeholder="Hr" required class="select-search form-control" name="hour_from" id="hour_from">
                                    <option value=""></option>
                                    @for($t=1; $t<=12; $t++)
                                        <option {{ old('hour_from') == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-4">
                                <select data-placeholder="Min" required class="select-search form-control" name="min_from" id="min_from">
                                    <option value=""></option>
                                    <option value="00">00</option>
                                    <option value="05">05</option>
                                    @for($t=10; $t<=55; $t+=5)
                                        <option {{ old('min_from') == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-4">
                                <select required class="select form-control" name="meridian_from">
                                    <option value=""></option>
                                    <option {{ old('meridian_from') == 'AM' ? 'selected' : '' }} value="AM">AM</option>
                                    <option {{ old('meridian_from') == 'PM' ? 'selected' : '' }} value="PM">PM</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- END TIME --}}
                    <div class="form-group mt-3">
                        <label class="font-weight-semibold text-slate-700">End Time <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-4">
                                <select data-placeholder="Hr" required class="select-search form-control" name="hour_to">
                                    <option value=""></option>
                                    @for($t=1; $t<=12; $t++)
                                        <option {{ old('hour_to') == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-4">
                                <select data-placeholder="Min" required class="select-search form-control" name="min_to">
                                    <option value=""></option>
                                    <option value="00">00</option>
                                    @for($t=05; $t<=55; $t+=5)
                                        <option {{ old('min_to') == sprintf('%02d', $t) ? 'selected' : '' }} value="{{ sprintf('%02d', $t) }}">{{ sprintf('%02d', $t) }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-4">
                                <select required class="select form-control" name="meridian_to">
                                    <option value=""></option>
                                    <option {{ old('meridian_to') == 'AM' ? 'selected' : '' }} value="AM">AM</option>
                                    <option {{ old('meridian_to') == 'PM' ? 'selected' : '' }} value="PM">PM</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4 opacity-50">

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm" style="background: #6366f1; border: none;">
                            Create Slot <i class="icon-paperplane ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Import Existing Slots Card --}}
    <div class="col-md-6">
        <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header header-elements-inline" style="background: #1e293b; color: white;">
                <h6 class="font-weight-bold card-title"><i class="icon-database-refresh mr-2"></i> Use Existing Slots</h6>
                {!! Qs::getPanelOptions() !!}
            </div>

            <div class="card-body bg-white p-4 d-flex flex-column justify-content-between" style="min-height: 310px;">
                <form method="post" action="{{ route('ts.use', $ttr->id) }}">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="ttr_id" class="font-weight-semibold text-slate-700">Select Source Timetable</label>
                        <p class="text-muted font-size-xs mb-2">Choose a record to copy its time configuration.</p>
                        <select id="ttr_id" data-placeholder="Searching existing records..." required class="select-search form-control-lg" name="ttr_id">
                            <option value=""></option>
                            @foreach($ts_existing as $ttr_ts)
                                <option value="{{ $ttr_ts->id }}">{{ $ttr_ts->name }} ({{ $ttr_ts->year }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="alert bg-light border-0 mb-4" style="border-radius: 8px;">
                        <span class="text-muted font-size-xs"><i class="icon-warning22 text-warning mr-1"></i> This action will replace all current slots for this class.</span>
                    </div>

                    <div class="text-right mt-auto">
                        <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm" style="background: #10b981; border: none;">
                            Import Now <i class="icon-sync ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>