@extends('layouts.master')
@section('page_title', 'My Attendance Report')
@section('content')

{{-- Summary Stats --}}
<div class="row">
    <div class="col-md-4">
        <div class="card bg-info-400">
            <div class="card-body text-center">
                <h3 class="font-weight-semibold">{{ $total_days }}</h3>
                <p>Total Working Days (This Month)</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success-400">
            <div class="card-body text-center">
                <h3 class="font-weight-semibold">{{ $present_days }}</h3>
                <p>Total Present Days</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-danger-400">
            <div class="card-body text-center">
                <h3 class="font-weight-semibold">{{ $percentage }}%</h3>
                <p>Attendance Percentage</p>
            </div>
        </div>
    </div>
</div>

{{-- Attendance Table --}}
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title font-weight-bold">Detailed Attendance Log - {{ date('F Y') }}</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="bg-light">
                        <th>Date</th>
                        <th>Day</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendance as $att)
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($att->att_date)) }}</td>
                        <td>{{ date('l', strtotime($att->att_date)) }}</td>
                        <td class="text-center">
                            @if($att->status == 'P')
                                <span class="badge badge-success">PRESENT</span>
                            @else
                                <span class="badge badge-danger">ABSENT</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">No attendance records found for this month.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection