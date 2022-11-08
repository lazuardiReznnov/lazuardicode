<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['categoryLetters', 'unit'];

    public function getRouteKeyName()
    {
        return 'reg_numb';
    }

    public function categoryLetters()
    {
        return $this->belongsTo(categoryLetters::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
