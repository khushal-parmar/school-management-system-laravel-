@extends('layouts.master')
@section('page_title', 'Create Payment')
@section('content')

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animated-card {
        animation: fadeInUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        border-radius: 16px !important;
        border: none !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
        background: #ffffff;
        overflow: hidden;
    }

    .gradient-header {
        background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%) !important;
        padding: 1.25rem 1.5rem !important;
        border-bottom: none !important;
    }

    .form-control-modern {
        border-radius: 10px !important;
        border: 1px solid #e5e7eb !important;
        padding: 10px 15px !important;
        transition: all 0.3s ease !important;
        background-color: #f9fafb !important;
    }

    .form-control-modern:focus {
        background-color: #ffffff !important;
        border-color: #6366f1 !important;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15) !important;
    }

    .btn-gradient {
        background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%) !important;
        border: none !important;
        border-radius: 10px !important;
        color: #ffffff !important;
        padding: 12px 28px !important;
        font-weight: 600 !important;
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.35) !important;
        transition: all 0.3s ease !important;
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.45) !important;
    }
</style>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card animated-card">
            {{-- Header --}}
            <div class="card-header gradient-header header-elements-inline text-white">
                <h6 class="card-title font-weight-bold mb-0"><i class="icon-cash3 mr-2"></i> Create New Payment Record</h6>
                {!! Qs::getPanelOptions() !!}
            </div>

            <div class="card-body p-4">
                <form class="ajax-store" method="post" action="{{ route('payments.store') }}">
                    @csrf
                    
                    {{-- Title --}}
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label font-weight-semibold text-slate-700">Title <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0" style="border-radius: 10px 0 0 10px;"><i class="icon-type text-indigo"></i></span>
                                </div>
                                <input name="title" value="{{ old('title') }}" required type="text" class="form-control form-control-modern border-left-0" style="border-radius: 0 10px 10px 0 !important;" placeholder="Eg. School Fees or Uniform Charges">
                            </div>
                        </div>
                    </div>

                    {{-- Class --}}
                    <div class="form-group row">
                        <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold text-slate-700">Apply to Class</label>
                        <div class="col-lg-9">
                            <select class="form-control select-search form-control-modern" name="my_class_id" id="my_class_id">
                                <option value="">All Classes (General Payment)</option>
                                @foreach($my_classes as $c)
                                    <option {{ old('my_class_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-muted font-size-xs mt-1 d-block">Leave empty if this payment applies to all students.</span>
                        </div>
                    </div>

                    {{-- Method --}}
                    <div class="form-group row">
                        <label for="method" class="col-lg-3 col-form-label font-weight-semibold text-slate-700">Payment Method</label>
                        <div class="col-lg-9">
                            <select class="form-control select form-control-modern" name="method" id="method">
                                <option value="Cash">Cash / Bank Deposit</option>
                                <option value="Online">Online Payment</option>
                            </select>
                        </div>
                    </div>

                    {{-- Amount --}}
                    <div class="form-group row">
                        <label for="amount" class="col-lg-3 col-form-label font-weight-semibold text-slate-700">Amount (₹) <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0 font-weight-bold text-indigo" style="border-radius: 10px 0 0 10px;">₹</span>
                                </div>
                                <input class="form-control form-control-modern border-left-0" style="border-radius: 0 10px 10px 0 !important;" value="{{ old('amount') }}" required name="amount" id="amount" type="number" placeholder="0.00">
                            </div>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="form-group row">
                        <label for="description" class="col-lg-3 col-form-label font-weight-semibold text-slate-700">Description</label>
                        <div class="col-lg-9">
                            <textarea class="form-control form-control-modern" name="description" id="description" rows="3" placeholder="Brief details about this payment...">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <hr class="my-4 opacity-50">

                    <div class="text-right">
                        <button type="submit" class="btn btn-gradient">
                            <span>Save Payment Record</span> <i class="icon-paperplane ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection