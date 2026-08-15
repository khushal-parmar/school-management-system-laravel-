@extends('layouts.master')
@section('page_title', 'Student Payments')
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

    .btn-gradient {
        background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%) !important;
        border: none !important;
        border-radius: 10px !important;
        color: #ffffff !important;
        padding: 8px 20px !important;
        font-weight: 600 !important;
    }

    .student-avatar {
        width: 44px;
        height: 44px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }
</style>

<div class="card animated-card mb-4">
    <div class="card-header header-elements-inline bg-white py-3 border-bottom">
        <h5 class="card-title font-weight-bold text-dark mb-0"><i class="icon-cash2 mr-2 text-indigo"></i> Select Class for Student Payments</h5>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body p-4">
        <form method="post" action="{{ route('payments.select_class') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="row align-items-end">
                        <div class="col-md-9">
                            <div class="form-group mb-0">
                                <label for="my_class_id" class="col-form-label font-weight-bold">Class:</label>
                                <select required id="my_class_id" name="my_class_id" class="form-control select form-control-modern">
                                    <option value="">Select Class</option>
                                    @foreach($my_classes as $c)
                                        <option {{ ($selected && $my_class_id == $c->id) ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
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
    <div class="card-body p-4">
        <table class="table datatable-button-html5-columns">
            <thead>
                <tr class="bg-light">
                    <th>S/N</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>ADM_No</th>
                    <th class="text-center">Payments</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img class="student-avatar" src="{{ $s->user->photo }}" alt="photo"></td>
                        <td class="font-weight-bold text-dark">{{ $s->user->name }}</td>
                        <td><span class="badge badge-light border">{{ $s->adm_no }}</span></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-indigo btn-sm dropdown-toggle rounded-pill px-3 shadow-sm" data-toggle="dropdown">
                                    Manage Payments
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('payments.invoice', [Qs::hash($s->user_id)]) }}" class="dropdown-item font-weight-bold text-indigo">All Payments</a>
                                    <div class="dropdown-divider"></div>
                                    @foreach(Pay::getYears($s->user_id) as $py)
                                        @if($py)
                                            <a href="{{ route('payments.invoice', [Qs::hash($s->user_id), $py]) }}" class="dropdown-item">{{ $py }} Session</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection