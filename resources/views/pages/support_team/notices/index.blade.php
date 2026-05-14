@extends('layouts.master')
@section('page_title', 'Notice Board')
@section('content')

<div class="card bg-dark border-0 shadow-lg" style="border-radius: 15px; background-color: #000 !important;">
    <div class="card-body p-0">
        {{-- Custom Navigation Tabs --}}
        <div class="d-flex border-bottom border-secondary">
            @if(Qs::userIsTeamSA())
                <a href="#create-notice" class="p-3 text-white font-weight-bold border-right border-secondary" data-toggle="tab" style="background: #1a1a1a;">Create Notice</a>
            @endif
            <a href="#view-board" class="p-3 text-white font-weight-bold {{ Qs::userIsTeamSA() ? '' : 'active' }}" data-toggle="tab" style="background: #1a1a1a;">Notice Board</a>
        </div>

        <div class="tab-content p-4">
            {{-- CREATE SECTION --}}
            @if(Qs::userIsTeamSA())
            <div class="tab-pane fade show active" id="create-notice">
                <div class="col-md-8 offset-md-2">
                    <h5 class="text-white mb-4"><i class="icon-plus-circle2 mr-2 text-primary"></i> Create New Notice</h5>
                    <form class="ajax-store" method="post" action="{{ route('notices.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-muted small font-weight-bold">NOTICE TITLE</label>
                            <input name="title" required type="text" class="form-control bg-secondary border-0 text-white shadow-sm" placeholder="Title of notice" style="border-radius: 10px; height: 45px;">
                        </div>

                        <div class="form-group">
                            <label class="text-muted small font-weight-bold">NOTICE BODY</label>
                            <textarea name="body" rows="4" class="form-control bg-secondary border-0 text-white shadow-sm" placeholder="Write your message here..." style="border-radius: 10px;"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="text-muted small font-weight-bold">ATTACH FILE (PNG, JPG, PDF)</label>
                            <input name="file" type="file" class="form-control-file text-muted">
                        </div>

                        <div class="form-group">
                            <label class="text-muted small font-weight-bold d-block">IMPORTANCE LEVEL</label>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-outline-success border-0 rounded-pill mr-2 active">
                                    <input type="radio" name="importance" value="green" checked> ● Low
                                </label>
                                <label class="btn btn-outline-warning border-0 rounded-pill mr-2">
                                    <input type="radio" name="importance" value="yellow"> ● Medium
                                </label>
                                <label class="btn btn-outline-danger border-0 rounded-pill">
                                    <input type="radio" name="importance" value="red"> ● High
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block rounded-pill shadow-lg mt-4" style="height: 45px;">Create Notice <i class="icon-paperplane ml-2"></i></button>
                    </form>
                </div>
            </div>
            @endif

            {{-- VIEW SECTION (Image Style) --}}
            <div class="tab-pane fade {{ Qs::userIsTeamSA() ? '' : 'show active' }}" id="view-board">
                <div class="row">
                    @forelse($notices as $n)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 h-100 shadow" style="border-radius: 15px; background-color: #1e1e26 !important; color: white;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="font-weight-bold mb-0 text-truncate" style="max-width: 80%;">{{ $n->title }}</h6>
                                    {{-- Glowing Importance Dot --}}
                                    <span style="height: 12px; width: 12px; background-color: {{ $n->importance }}; border-radius: 50%; box-shadow: 0 0 10px {{ $n->importance }};"></span>
                                </div>
                                <span class="text-muted small">{{ $n->created_at->format('d M, Y') }}</span>
                                
                                <p class="small mt-3 mb-4" style="color: #cbd5e1; line-height: 1.6;">{{ $n->body }}</p>

                                <div class="d-flex justify-content-between align-items-center pt-3 border-top border-secondary">
                                    <div>
                                        <i class="icon-eye text-info mr-3 cursor-pointer"></i>
                                        @if($n->file)
                                            <a href="{{ Storage::url($n->file) }}" download class="text-muted"><i class="icon-download4"></i></a>
                                        @endif
                                    </div>
                                    @if(Qs::userIsTeamSA())
                                    <div class="list-icons">
                                        <a href="#" class="text-success mr-2"><i class="icon-pencil7"></i></a>
                                        <a href="#" onclick="confirmDelete('{{ $n->id }}')" class="text-danger"><i class="icon-trash"></i></a>
                                        <form method="post" id="item-delete-{{ $n->id }}" action="{{ route('notices.destroy', $n->id) }}" class="hidden">@csrf @method('delete')</form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="icon-notification2 text-muted mb-3" style="font-size: 50px;"></i>
                            <p class="text-muted">No notices available on the board.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection