<div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
        <thead>
            <tr class="bg-info text-white text-uppercase" style="font-size: 12px;">
                <th rowspan="2" style="vertical-align: middle; width: 5%;">S/N</th>
                <th rowspan="2" style="vertical-align: middle; text-align: left; width: 25%;">Subjects</th>
                <th colspan="2">Continuous Assessment (40)</th>
                <th rowspan="2" style="vertical-align: middle; width: 10%;">Exams<br>(60)</th>
                <th rowspan="2" style="vertical-align: middle; width: 10%;">Total<br>(100)</th>
                <th rowspan="2" style="vertical-align: middle; width: 10%;">Grade</th>
                <th rowspan="2" style="vertical-align: middle; width: 10%;">Pos.</th>
                <th rowspan="2" style="vertical-align: middle; width: 15%;">Remarks</th>
            </tr>
            <tr class="bg-light text-dark" style="font-size: 11px;">
                <th style="width: 10%;">CA1 (20)</th>
                <th style="width: 10%;">CA2 (20)</th>
            </tr>
        </thead>

        <tbody>
            @php 
                $shown_subject_ids = []; 
            @endphp

            {{-- ૧. જે વિષયો લિસ્ટમાં છે તેને બતાવો --}}
            @foreach($subjects as $sub)
                @php
                    $mk = $marks->where('subject_id', $sub->id)->first();
                    $shown_subject_ids[] = $sub->id;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-left font-weight-bold text-dark">{{ $sub->name }}</td>
                    
                    @if($mk)
                        <td>{{ $mk->t1 ?? '0' }}</td>
                        <td>{{ $mk->t2 ?? '0' }}</td>
                        <td>{{ $mk->exm ?? '0' }}</td>
                        <td class="bg-light font-weight-bold text-info">
                            {{ $mk->tex1 ?: ($mk->t1 + $mk->t2 + $mk->exm) }}
                        </td>
                        <td>{{ $mk->grade ? $mk->grade->name : '-' }}</td>
                        <td>{!! $mk->sub_pos ? Mk::getSuffix($mk->sub_pos) : '-' !!}</td>
                        <td class="small text-muted italic">{{ $mk->grade ? $mk->grade->remark : '-' }}</td>
                    @else
                        <td colspan="7" class="text-muted small italic">No marks entered</td>
                    @endif
                </tr>
            @endforeach

            {{-- ૨. ગુજરાતી જેવા વિષયો જે લિસ્ટમાં નથી પણ માર્ક્સ DB માં છે --}}
            @foreach($marks as $m)
                @if(!in_array($m->subject_id, $shown_subject_ids))
                    <tr>
                        <td>*</td>
                        <td class="text-left font-weight-bold text-dark">
                            {{-- જો સબ્જેક્ટ રિલેશન કામ કરતું હોય તો નામ બતાવશે, નહીતર ID --}}
                            {{ $m->subject ? $m->subject->name : 'Gujarati (ID: '.$m->subject_id.')' }}
                        </td>
                        <td>{{ $m->t1 ?? '0' }}</td>
                        <td>{{ $m->t2 ?? '0' }}</td>
                        <td>{{ $m->exm ?? '0' }}</td>
                        <td class="bg-light font-weight-bold text-info">
                            {{ $m->tex1 ?: ($m->t1 + $m->t2 + $m->exm) }}
                        </td>
                        <td>{{ $m->grade ? $m->grade->name : '-' }}</td>
                        <td>{!! $m->sub_pos ? Mk::getSuffix($m->sub_pos) : '-' !!}</td>
                        <td class="small text-muted italic">{{ $m->grade ? $m->grade->remark : 'Extra Subject' }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
        
        <tfoot class="bg-light">
            <tr class="font-weight-bold text-dark">
                <td colspan="2" class="text-left py-3 px-3">TOTAL: <span class="text-info">{{ $exam_records->first()->total ?? '0' }}</span></td>
                <td colspan="3">AVG: <span class="text-success">{{ $exam_records->first()->ave ?? '0' }}%</span></td>
                <td colspan="4" class="text-right px-3 text-danger">RANK: {{ Mk::getSuffix($exam_records->first()->pos ?? 0) }}</td>
            </tr>
        </tfoot>
    </table>
</div>

<style>
    .table td, .table th { vertical-align: middle !important; border: 1px solid #dee2e6 !important; }
</style>