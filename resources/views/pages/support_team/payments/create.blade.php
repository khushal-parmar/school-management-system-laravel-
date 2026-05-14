@extends('layouts.master')
@section('page_title', 'Create Payment')
@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                {{-- Header with Gradient --}}
                <div class="card-header header-elements-inline text-white" style="background: linear-gradient(45deg, #4338ca, #6366f1);">
                    <h6 class="card-title font-weight-bold"><i class="icon-cash3 mr-2"></i> Create New Payment Record</h6>
                    {!! Qs::getPanelOptions() !!}
                </div>

                <div class="card-body bg-light p-4">
                    <form class="ajax-store" method="post" action="{{ route('payments.store') }}">
                        @csrf
                        
                        {{-- Title Field --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-bold text-slate-700">Title <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-right-0"><i class="icon-type text-indigo"></i></span>
                                    </div>
                                    <input name="title" value="{{ old('title') }}" required type="text" class="form-control border-left-0" placeholder="Eg. School Fees or Uniform Charges">
                                </div>
                            </div>
                        </div>

                        {{-- Class Field --}}
                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-bold text-slate-700">Apply to Class</label>
                            <div class="col-lg-9">
                                <select class="form-control select-search" name="my_class_id" id="my_class_id">
                                    <option value="">All Classes (General Payment)</option>
                                    @foreach($my_classes as $c)
                                        <option {{ old('my_class_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-muted font-size-xs">Leave empty if this payment applies to all students.</span>
                            </div>
                        </div>

                       {{-- Method Field --}}
<div class="form-group row">
    <label for="method" class="col-lg-3 col-form-label font-weight-bold text-slate-700">Payment Method</label>
    <div class="col-lg-9">
        <select class="form-control select shadow-sm" name="method" id="method" style="border-radius: 8px;">
            <option value="Cash">Cash / Bank Deposit</option>
            {{-- મેં અહીંથી disabled કાઢી નાખ્યું છે --}}
            <option value="Online">Online Payment</option>
        </select>
    </div>
</div>

                        {{-- Amount Field --}}
                        <div class="form-group row">
                            <label for="amount" class="col-lg-3 col-form-label font-weight-bold text-slate-700">Amount (₹) <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-indigo-50 border-right-0 font-weight-bold">₹</span>
                                    </div>
                                    <input class="form-control border-left-0" value="{{ old('amount') }}" required name="amount" id="amount" type="number" placeholder="0.00">
                                </div>
                            </div>
                        </div>

                        {{-- Description Field --}}
                        <div class="form-group row">
                            <label for="description" class="col-lg-3 col-form-label font-weight-bold text-slate-700">Description</label>
                            <div class="col-lg-9">
                                <textarea class="form-control shadow-sm" name="description" id="description" rows="2" placeholder="Brief details about this payment...">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <hr class="my-4 opacity-50">

                        <div class="text-right">
                            <button type="submit" class="btn btn-indigo rounded-pill px-4 shadow-sm" style="transition: all 0.3s;">
                                <strong>Save Payment Record</strong> <i class="icon-paperplane ml-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection