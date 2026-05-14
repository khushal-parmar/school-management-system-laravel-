<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Notice extends Model
{
    protected $fillable = [
        'title', 
        'body', 
        'file', 
        'importance', 
        'created_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}