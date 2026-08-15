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
        border-radius: 10px !important;
        border: 1px solid #e5e7eb !important;
    }

    .table-modern {
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .table-modern tbody tr {
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
        border-radius: 8px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .table-modern tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.08);
    }

    .btn-gradient {
        background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%) !important;
        border: none !important;
        border-radius: 10px !important;
        color: #ffffff !important;
        padding: 8px 20px !important;
        font-weight: 600 !important;
    }
</style>

<div class="card animated-card mb-4">
    <div class="card-header header-elements-inline bg-white py-3 border-bottom">
        <h5 class="card-title font-weight-bold text-dark mb-0"><i class="icon-cash2 mr-2 text-indigo"></i> Select Session Year</h5>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body p-4">
        <form method="post" action="{{ route('payments.select_year') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="row align-items-end">
                        <div class="col-md-9">
                            <div class="form-group mb-0">
                                <label for="year" class="col-form-label font-weight-bold">Select Year <span class="text-danger">*</span></label>
                                <select required id="year" name="year" class="form-control select form-control-modern">
                                    @foreach($years as $yr)
                                        <option {{ ($selected && $year == $yr->year) ? 'selected' : '' }} value="{{ $yr->year }}">{{ $yr->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 text-right">
                            <button type="submit" class="btn btn-gradient w-100">Submit <i class="icon-paperplane ml-1"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@if($selected)
<div class="card animated-card">
    <div class="card-header header-elements-inline bg-white py-3 border-bottom">
        <h6 class="card-title font-weight-bold text-dark mb-0">Manage Payments for {{ $year }} Session</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body p-4">
        <ul class="nav nav-tabs nav-tabs-highlight border-bottom-0 mb-3">
            <li class="nav-item"><a href="#all-payments" class="nav-link active font-weight-bold" data-toggle="tab">All Classes</a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle font-weight-bold" data-toggle="dropdown">Class Payments</a>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach($my_classes as $mc)
                        <a href="#pc-{{ $mc->id }}" class="dropdown-item" data-toggle="tab">{{ $mc->name }}</a>
                    @endforeach
                </div>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-payments">
                <table class="table datatable-button-html5-columns table-modern">
                    <thead>
                        <tr class="bg-light">
                            <th>#</th>
                            <th>Title</th>
                            <th>Amount (₹)</th>
                            <th>Ref_No</th>
                            <th>Class</th>
                            <th>Method</th>
                            <th>Info</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-weight-bold text-dark">{{ $p->title }}</td>
                                <td class="text-indigo font-weight-bold">₹ {{ number_format($p->amount, 2) }}</td>
                                <td><span class="badge badge-light border">{{ $p->ref_no }}</span></td>
                                <td>{{ $p->my_class_id ? $p->my_class->name : 'All Classes' }}</td>
                                <td><span class="badge badge-soft-indigo">{{ ucwords($p->method) }}</span></td>
                                <td>{{ $p->description }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a href="{{ route('payments.edit', $p->id) }}" class="dropdown-item"><i class="icon-pencil text-indigo"></i> Edit</a>
                                                <a id="{{ $p->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item text-danger"><i class="icon-trash"></i> Delete</a>
                                                <form method="post" id="item-delete-{{ $p->id }}" action="{{ route('payments.destroy', $p->id) }}" class="hidden">@csrf @method('delete')</form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @foreach($my_classes as $mc)
                <div class="tab-pane fade" id="pc-{{ $mc->id }}">
                    <table class="table datatable-button-html5-columns table-modern">
                        <thead>
                            <tr class="bg-light">
                                <th>#</th>
                                <th>Title</th>
                                <th>Amount (₹)</th>
                                <th>Ref_No</th>
                                <th>Class</th>
                                <th>Method</th>
                                <th>Info</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments->where('my_class_id', $mc->id) as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="font-weight-bold text-dark">{{ $p->title }}</td>
                                    <td class="text-indigo font-weight-bold">₹ {{ number_format($p->amount, 2) }}</td>
                                    <td><span class="badge badge-light border">{{ $p->ref_no }}</span></td>
                                    <td>{{ $p->my_class_id ? $p->my_class->name : '' }}</td>
                                    <td><span class="badge badge-soft-indigo">{{ ucwords($p->method) }}</span></td>
                                    <td>{{ $p->description }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                                <div class="dropdown-menu dropdown-menu-left">
                                                    <a href="{{ route('payments.edit', $p->id) }}" class="dropdown-item"><i class="icon-pencil text-indigo"></i> Edit</a>
                                                    <a id="{{ $p->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item text-danger"><i class="icon-trash"></i> Delete</a>
                                                    <form method="post" id="item-delete-{{ $p->id }}" action="{{ route('payments.destroy', $p->id) }}" class="hidden">@csrf @method('delete')</form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@endsection