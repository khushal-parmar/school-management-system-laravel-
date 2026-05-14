 @extends('layouts.master')
@section('page_title', 'My Fees History')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title font-weight-bold">My Payment Status</h6>
    </div>
    {{-- આ તમારી ફાઇલનો ઉપરનો ભાગ છે --}}
<div class="card">
    <div class="card-header header-elements-inline">
        {{-- અહીં ફેરફાર કર્યો: સ્ટુડન્ટનું નામ અને એડમિશન નંબર બતાવવા માટે --}}
        <h6 class="card-title font-weight-bold">
            Payment Status: <span class="text-primary">{{ $student->user->name }} ({{ $student->adm_no }})</span>
        </h6>
    </div>
    
    {{-- બાકીનો ટેબલ વાળો કોડ એમ જ રહેવા દો --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="bg-light font-weight-bold">
                    <tr>
                        <th>#</th>
                        <th class="text-left">Fee Description</th>
                        <th>Total Amount</th>
                        <th>Amount Paid</th>
                        <th>Balance</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fees as $f)
                        @php
                            $paid_amt = (float) ($f->amt_paid ?? 0);
                            $total_amt = (float) ($f->total_amount ?? 0);
                            $is_cleared = (int) ($f->paid ?? 0);
                            $balance = $total_amt - $paid_amt;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-left font-weight-semibold">{{ $f->title }}</td>
                            <td>{{ number_format($total_amt, 2) }}</td>
                            <td class="text-success font-weight-bold">{{ number_format($paid_amt, 2) }}</td>
                            <td class="text-danger">{{ number_format($balance, 2) }}</td>
                            <td>
                                @if($is_cleared === 1 || ($paid_amt >= $total_amt && $total_amt > 0))
                                    <span class="badge badge-success px-2 py-1">COMPLETED</span>
                                @elseif($paid_amt > 0)
                                    <span class="badge badge-warning px-2 py-1">PARTIAL</span>
                                @else
                                    <span class="badge badge-danger px-2 py-1">NOT PAID</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-muted">No fees assigned to you for this session.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection