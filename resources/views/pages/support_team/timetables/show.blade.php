@extends('layouts.master')
@section('page_title', 'View TimeTable')
@section('content')

    {{-- System Info Header --}}
    <div class="card border-0 shadow-sm mb-3" style="border-radius: 15px; background: linear-gradient(45deg, #1e293b, #334155); color: #fff;">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="mb-1 font-weight-bold">{{ $ttr->name }}</h3>
                    <p class="mb-0 opacity-75">
                        <i class="icon-graduation2 mr-2"></i> Class: <strong>{{ $my_class->name }}</strong> 
                        <span class="mx-3">|</span> 
                        <i class="icon-calendar52 mr-2"></i> Session: <strong>{{ $ttr->year }}</strong>
                    </p>
                </div>
                <div class="col-md-4 text-md-right mt-3 mt-md-0">
                    <span class="badge badge-pill px-3 py-2" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.4);">
                        {{ ($ttr->exam_id) ? 'EXAM SCHEDULE' : 'CLASS TIMETABLE' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    @php
        // દિવસોનો સાચો ક્રમ નક્કી કરો
        $ordered_days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        
        // જો આ એક્ઝામ ટાઈમ ટેબલ હોય, તો તારીખ મુજબ સોર્ટિંગ રાખવું પડે, 
        // પણ જો નોર્મલ ક્લાસ ટાઈમ ટેબલ હોય તો સોમવારથી રવિવારનો ક્રમ આવશે.
        $display_days = $ttr->exam_id ? $days : $ordered_days;
    @endphp

    <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered text-center mb-0">
                    <thead>
                        <tr style="background-color: #f8fafc;">
                            <th style="width: 150px; background: #8b5cf6; color: #fff;" class="py-3">
                                <span class="d-block font-size-xs opacity-75">TIME / DAYS</span>
                                <i class="icon-calendar3"></i>
                            </th>
                            {{-- હવે દિવસો Monday થી Sunday લાઈનમાં આવશે --}}
                            @foreach($display_days as $day)
                                @if(!$ttr->exam_id || ($ttr->exam_id && in_array($day, $days->toArray())))
                                    <th class="py-3 text-indigo-800 font-weight-bold">
                                        @if($ttr->exam_id)
                                            <div>{{ date('D', strtotime($day)) }}</div>
                                            <div class="text-muted font-size-xs font-weight-normal">{{ date('d/m', strtotime($day)) }}</div>
                                        @else
                                            {{ strtoupper($day) }}
                                        @endif
                                    </th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($time_slots as $tms)
                            <tr>
                                <td class="align-middle bg-light font-weight-semibold">
                                    <div class="text-slate-800 font-size-sm">{{ $tms->time_from }}</div>
                                    <div class="text-muted font-size-xs">- {{ $tms->time_to }} -</div>
                                </td>

                                @foreach($display_days as $day)
                                    @if(!$ttr->exam_id || ($ttr->exam_id && in_array($day, $days->toArray())))
                                        <td class="align-middle p-2">
                                            @php 
                                                $slot_data = $d_time->where('day', $day)->where('time', $tms->full)->first();
                                            @endphp

                                            @if($slot_data && $slot_data['subject'])
                                                <div class="py-2 px-1 shadow-sm border-0" 
                                                     style="background: #f5f3ff; border-radius: 8px; border-top: 3px solid #8b5cf6 !important;">
                                                    <div class="font-weight-bold text-indigo-700 font-size-sm">
                                                        {{ $slot_data['subject'] }}
                                                    </div>
                                                </div>
                                            @else
                                                <span class="text-muted opacity-25">---</span>
                                            @endif
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a target="_blank" href="{{ route('ttr.print', $ttr->id) }}" class="btn btn-indigo rounded-pill px-4 shadow">
            <i class="icon-printer mr-2"></i> Print Timetable
        </a>
    </div>

@endsection