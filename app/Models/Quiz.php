<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
    ];

    protected $dates = ['finished_at'];
    /*
    public function getFinishedAtAttribute($dates)
    {
        return $dates ? Carbon::parse($date) : null;
    }
    */
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
