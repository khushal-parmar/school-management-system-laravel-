@extends('layouts.master')
@section('page_title', 'My Children Fees')
@section('content')

<div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
    {{-- Header with Student Profile Style --}}
    <div class="card-header bg-dark text-white p-3">
        <div class="d-flex align-items-center">
            <img class="rounded-circle mr-3" style="height: 50px; width: 50px; border: 2px solid #fff;" src="{{ $student->user->photo }}" alt="photo">
            <div>
                <h6 class="card-title font-weight-bold mb-0" style="font-size: 1.1rem;">
                    Payment Status: <span class="text-warning">{{ $student->user->name }}</span>
                </h6>
                <span class="small opacity-75">ID: {{ $student->adm_no }} | Class: {{ $student->my_class->name }} {{ $student->section->name }}</span>
            </div>
        </div>
    </div>
  
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr class="text-indigo-800 font-weight-bold text-uppercase small">
                        <th class="py-3 px-4">#</th>
                        <th class="py-3 px-4">Fee Description</th>
                        <th class="py-3 px-4 text-center">Total Amount</th>
                        <th class="py-3 px-4 text-center text-success">Paid</th>
                        <th class="py-3 px-4 text-center text-danger">Balance</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fees as $f)
                        @php
                            // કંટ્રોલર માંથી આવતા ડેટા મુજબ વેરિએબલ્સ સેટ કર્યા 
                            $total = $f->total_amount ?? 0;
                            $paid = $f->amt_paid ?? 0;
                            $balance = $total - $paid;
                        @endphp
                        <tr class="border-bottom">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">
                                <span class="font-weight-semibold d-block text-slate-700">{{ $f->fee_title ?? 'School Fees' }}</span>
                                <span class="text-muted extra-small">Ref: {{ $f->ref_no ?? 'N/A' }}</span>
                            </td>
                            <td class="py-3 px-4 text-center font-weight-bold">
                                {{ number_format($total, 2) }}
                            </td>
                            <td class="py-3 px-4 text-center text-success font-weight-bold">
                                {{ number_format($paid, 2) }}
                            </td>
                            <td class="py-3 px-4 text-center text-danger font-weight-bold">
                                {{ number_format($balance, 2) }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                @if($f->paid == 1)
                                    <span class="badge badge-success px-2 py-1 rounded-pill shadow-sm">COMPLETED</span>
                                @elseif($paid > 0)
                                    <span class="badge badge-warning px-2 py-1 rounded-pill shadow-sm">PARTIAL</span>
                                @else
                                    <span class="badge badge-danger px-2 py-1 rounded-pill shadow-sm">NOT PAID</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                @if($paid > 0)
                                    <a href="{{ route('payments.receipts', Qs::hash($f->id)) }}" class="btn btn-sm btn-indigo px-3 shadow-sm rounded-pill">
                                        <i class="icon-printer mr-1"></i> Receipt
                                    </a>
                                @else
                                    <span class="text-muted small italic">No Payment Yet</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="mb-3">
                                    <i class="icon-cash3 text-light" style="font-size: 60px; opacity: 0.5;"></i>
                                </div>
                                <h5 class="font-weight-bold text-muted">No Fees Record Found!</h5>
                                <p class="text-muted mx-auto mb-4" style="max-width: 400px;">
                                    તમારા બાળકના ક્લાસ માટે હજુ સુધી ફીઝ જનરેટ કરવામાં આવી નથી. કૃપા કરીને એડમિનનો સંપર્ક કરો.
                                </p>
                                <div class="p-3 bg-light rounded d-inline-block border border-dashed text-left">
                                    <strong>Admin માટે સૂચના:</strong><br>
                                    <span class="small">૧. <b>Payments -> Manage Payments</b> માં જાઓ.</span><br>
                                    <span class="small">૨. ક્લાસ અને વર્ષ પસંદ કરો.</span><br>
                                    <span class="small">૩. ફીઝની સામે <b>Manage</b> બટન પર ક્લિક કરો.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Session Info Footer --}}
<div class="d-flex justify-content-between align-items-center mt-3 px-2">
    <span class="text-muted small">Academic Session: <b>{{ Qs::getCurrentSession() }}</b></span>
    <span class="text-muted small">Generated on: {{ date('d M, Y') }}</span>
</div>

@endsection