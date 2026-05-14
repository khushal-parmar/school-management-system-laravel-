<div class="card border-0 shadow-sm mt-4" style="border-radius: 15px;">
    <div class="card-header header-elements-inline bg-success" style="border-radius: 15px 15px 0 0;">
        <h6 class="font-weight-bold card-title">Manage Time Slots - {{ $ttr->name }}</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <table id="time_slots_table" class="table datatable-button-html5-columns table-hover">
            <thead>
            <tr class="bg-light">
                <th>S/N</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($time_slots as $tms)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="font-weight-semibold text-primary">{{ $tms->time_from }}</td>
                    <td class="font-weight-semibold text-danger">{{ $tms->time_to }}</td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item text-dark" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow-lg border-0" style="border-radius: 10px;">
                                    {{-- Edit --}}
                                    <a href="{{ route('ts.edit', $tms->id) }}" class="dropdown-item"><i class="icon-pencil text-info"></i> Edit Slot</a>

                                    {{-- Delete --}}
                                    @if(Qs::userIsSuperAdmin())
                                        <div class="dropdown-divider"></div>
                                        <a id="{{ $tms->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item text-danger">
                                            <i class="icon-trash"></i> Delete Slot
                                        </a>
                                        <form method="post" id="item-delete-{{ $tms->id }}" action="{{ route('ts.destroy', $tms->id) }}" class="hidden">
                                            @csrf @method('delete')
                                        </form>
                                    @endif
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