@extends('layouts.master')
@section('page_title', 'Manage Payments')
@section('content')

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animated-card {
        animation: fadeIn 0.4s ease-in-out forwards;
        border-radius: 16px !important;
        border: none !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06) !important;
        background: #ffffff;
    }

    .form-control-modern {
        border-radius: 8px !important;
        border: 1px solid #e5e7eb !important;
    }

    .btn-pay {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important;
        border: none !important;
        border-radius: 8px !important;
        color: #fff !important;
        font-weight: 600 !important;
        box-shadow: 0 4px 10px rgba(220, 38, 38, 0.25) !important;
        transition: all 0.2s ease;
    }

    .btn-pay:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 14px rgba(220, 38, 38, 0.35) !important;
    }
</style>

<div class="card animated-card">
    <div class="card-header header-elements-inline bg-white py-3 border-bottom">
        <h6 class="card-title font-weight-bold text-dark mb-0"><i class="icon-user-check mr-2 text-indigo"></i> Manage Payment Records for {{ $sr->user->name }}</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body p-4">
        <ul class="nav nav-tabs nav-tabs-highlight border-bottom-0 mb-3">
            <li class="nav-item"><a href="#all-uc" class="nav-link active font-weight-bold" data-toggle="tab">Incomplete Payments</a></li>
            <li class="nav-item"><a href="#all-cl" class="nav-link font-weight-bold" data-toggle="tab">Completed Payments</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-uc">
                <table class="table datatable-button-html5-columns table-responsive">
                    <thead>
                        <tr class="bg-light">
                            <th>#</th>
                            <th>Title</th>
                            <th>Pay_Ref</th>
                            <th>Amount (₹)</th>
                            <th>Paid (₹)</th>
                            <th>Balance (₹)</th>
                            <th style="min-width: 200px;">Pay Now</th>
                            <th>Receipt_No</th>
                            <th>Year</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($uncleared as $uc)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-weight-bold text-dark">{{ $uc->payment->title }}</td>
                                <td><span class="badge badge-light border">{{ $uc->payment->ref_no }}</span></td>
                                <td class="font-weight-bold" id="amt-{{ Qs::hash($uc->id) }}" data-amount="{{ $uc->payment->amount }}">{{ number_format($uc->payment->amount, 2) }}</td>
                                <td id="amt_paid-{{ Qs::hash($uc->id) }}" data-amount="{{ $uc->amt_paid ?: 0 }}" class="text-success font-weight-bold">{{ number_format($uc->amt_paid ?: 0, 2) }}</td>
                                <td id="bal-{{ Qs::hash($uc->id) }}" class="text-danger font-weight-bold">{{ number_format($uc->balance ?: $uc->payment->amount, 2) }}</td>
                                <td>
                                    <form id="{{ Qs::hash($uc->id) }}" method="post" class="ajax-pay" action="{{ route('payments.pay_now', Qs::hash($uc->id)) }}">
                                        @csrf
                                        <div class="row no-gutters">
                                            <div class="col-7 pr-1">
                                                <input min="1" max="{{ $uc->balance ?: $uc->payment->amount }}" id="val-{{ Qs::hash($uc->id) }}" class="form-control form-control-modern" required placeholder="Amount" title="Pay Now" name="amt_paid" type="number">
                                            </div>
                                            <div class="col-5">
                                                <button data-text="Pay" class="btn btn-pay w-100 py-2" type="submit">Pay <i class="icon-paperplane ml-1"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td><span class="badge badge-light border">{{ $uc->ref_no }}</span></td>
                                <td>{{ $uc->year }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a id="{{ Qs::hash($uc->id) }}" onclick="confirmReset(this.id)" href="#" class="dropdown-item text-warning"><i class="icon-reset"></i> Reset Payment</a>
                                                <form method="post" id="item-reset-{{ Qs::hash($uc->id) }}" action="{{ route('payments.reset_record', Qs::hash($uc->id)) }}" class="hidden">@csrf @method('delete')</form>
                                                <a target="_blank" href="{{ route('payments.receipts', Qs::hash($uc->id)) }}" class="dropdown-item"><i class="icon-printer text-indigo"></i> Print Receipt</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="all-cl">
                <table class="table datatable-button-html5-columns table-responsive">
                    <thead>
                        <tr class="bg-light">
                            <th>#</th>
                            <th>Title</th>
                            <th>Pay_Ref</th>
                            <th>Amount (₹)</th>
                            <th>Receipt_No</th>
                            <th>Year</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cleared as $cl)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-weight-bold text-dark">{{ $cl->payment->title }}</td>
                                <td><span class="badge badge-light border">{{ $cl->payment->ref_no }}</span></td>
                                <td class="font-weight-bold text-indigo">₹ {{ number_format($cl->payment->amount, 2) }}</td>
                                <td><span class="badge badge-light border">{{ $cl->ref_no }}</span></td>
                                <td>{{ $cl->year }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a id="{{ Qs::hash($cl->id) }}" onclick="confirmReset(this.id)" href="#" class="dropdown-item text-warning"><i class="icon-reset"></i> Reset Payment</a>
                                                <form method="post" id="item-reset-{{ Qs::hash($cl->id) }}" action="{{ route('payments.reset_record', Qs::hash($cl->id)) }}" class="hidden">@csrf @method('delete')</form>
                                                <a target="_blank" href="{{ route('payments.receipts', Qs::hash($cl->id)) }}" class="dropdown-item"><i class="icon-printer text-indigo"></i> Print Receipt</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection