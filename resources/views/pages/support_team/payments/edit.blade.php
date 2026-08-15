@extends('layouts.master')
@section('page_title', 'Edit Payment')
@section('content')

<style>
    @keyframes slideInUp {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animated-card {
        animation: slideInUp 0.4s ease-out forwards;
        border-radius: 16px !important;
        border: none !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
        background: #ffffff;
    }

    .form-control-modern {
        border-radius: 10px !important;
        border: 1px solid #e5e7eb !important;
        padding: 10px 15px !important;
        transition: all 0.25s ease !important;
    }

    .form-control-modern:focus {
        border-color: #6366f1 !important;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15) !important;
    }

    .btn-gradient {
        background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%) !important;
        border: none !important;
        border-radius: 10px !important;
        color: #ffffff !important;
        padding: 10px 24px !important;
        font-weight: 600 !important;
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.35) !important;
        transition: all 0.3s ease !important;
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(99, 102, 241, 0.45) !important;
    }
</style>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card animated-card">
            <div class="card-header header-elements-inline bg-white py-3 border-bottom">
                <h6 class="card-title font-weight-bold text-dark mb-0"><i class="icon-pencil5 mr-2 text-indigo"></i> Edit Payment Record</h6>
                {!! Qs::getPanelOptions() !!}
            </div>

            <div class="card-body p-4">
                <form class="ajax-update" method="post" action="{{ route('payments.update', $payment->id) }}">
                    @csrf @method('PUT')
                    
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Title <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input name="title" value="{{ $payment->title }}" required type="text" class="form-control form-control-modern" placeholder="Eg. School Fees">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Class </label>
                        <div class="col-lg-9">
                            <input class="form-control form-control-modern bg-light" disabled value="{{ $payment->my_class_id ? $payment->my_class->name : 'All Classes' }}" type="text">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="method" class="col-lg-3 col-form-label font-weight-semibold">Payment Method</label>
                        <div class="col-lg-9">
                            <input value="{{ ucwords($payment->method) }}" disabled class="form-control form-control-modern bg-light" type="text">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="amount" class="col-lg-3 col-form-label font-weight-semibold">Amount (₹)</label>
                        <div class="col-lg-9">
                            <input disabled class="form-control form-control-modern bg-light font-weight-bold text-indigo" value="{{ $payment->amount }}" id="amount" type="text">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-lg-3 col-form-label font-weight-semibold">Description</label>
                        <div class="col-lg-9">
                            <textarea class="form-control form-control-modern" name="description" id="description" rows="3">{{ $payment->description }}</textarea>
                        </div>
                    </div>

                    <div class="text-right mt-4">
                        <button type="submit" class="btn btn-gradient">Update Payment <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection