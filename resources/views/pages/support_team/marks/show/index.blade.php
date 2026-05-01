 @extends('layouts.master')
@section('page_title', 'Student Marksheet')
@section('content')

    {{-- પ્રોફાઈલ હેડર સેક્શન --}}
    <div class="card shadow-sm mb-4 border-left-info border-left-3">
        <div class="card-body">
            <div class="d-sm-flex align-items-sm-center">
                <div class="mr-sm-3 mb-3 mb-sm-0">
                    <div class="bg-light p-3 rounded-circle">
                        <i class="icon-user text-info icon-2x"></i>
                    </div>
                </div>
                <div>
                    <h5 class="font-weight-bold mb-0 text-uppercase">{{ $sr->user->name }}</h5>
                    <ul class="list-inline list-inline-dotted text-muted mb-0">
                        <li class="list-inline-item">Class: <span class="font-weight-semibold text-dark">{{ $my_class->name }}</span></li>
                        <li class="list-inline-item">Section: <span class="font-weight-semibold text-dark">{{ $my_class->section->first()->name }}</span></li>
                    </ul>
                </div>
                <div class="ml-sm-auto text-right">
                    <span class="badge badge-light badge-striped badge-striped-left border-left-info text-info-800 p-2">
                        ACADEMIC YEAR: {{ $year }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    @foreach($exams as $ex)
        @foreach($exam_records->where('exam_id', $ex->id) as $exr)
            <div class="card border-top-info border-top-3 shadow-sm mb-4">
                <div class="card-header bg-transparent header-elements-inline">
                    <h6 class="card-title font-weight-bold text-uppercase text-info">
                        <i class="icon-file-text2 mr-2"></i> {{ $ex->name }} - {{ $ex->year }}
                    </h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{-- માર્કશીટ ટેબલ સેક્શન (Sheet.blade.php) --}}
                    <div class="row">
                        <div class="col-md-12">
                            @include('pages.support_team.marks.show.sheet')
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- ટીચરની કોમેન્ટ્સ --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-light border-0 shadow-none mb-0">
                                <div class="card-body">
                                    <h6 class="font-weight-bold border-bottom pb-2">
                                        <i class="icon-bubble-lines4 mr-2 text-info"></i> TEACHER'S REMARKS
                                    </h6>
                                    <p class="text-muted font-italic">
                                        {{ $exr->t_comment ?: 'No comments recorded for this exam.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- પ્રિન્ટ બટન --}}
                    <div class="text-center mt-4">
                        <a target="_blank" href="{{ route('marks.print', [Qs::hash($student_id), $ex->id, $year]) }}" class="btn btn-primary btn-labeled btn-labeled-left btn-lg shadow">
                            <b><i class="icon-printer"></i></b> PRINT REPORT CARD
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach

    <style>
        .border-left-3 { border-left-width: 3px !important; }
        .border-top-3 { border-top-width: 3px !important; }
        .card { border-radius: 10px; overflow: hidden; }
        .icon-2x { font-size: 2rem; }
    </style>

@endsection