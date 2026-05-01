<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Attendance extends Model
{
    // આપણે ટેબલનું નામ મેન્યુઅલી આપી દઈએ છીએ
    protected $table = 'attendances';

    // કઈ કોલમ્સમાં ડેટા સેવ કરવાની છૂટ આપવી છે
    protected $fillable = [
        'student_id',
        'my_class_id',
        'section_id',
        'att_date',
        'status',
        'year'
    ];

    // જો તમારે સ્ટુડન્ટ સાથે રિલેશન જોડવું હોય તો (Optional)
    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}