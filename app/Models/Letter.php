<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['unit', 'categoryletters'];

    public function categoryLetters()
    {
        return $this->belongsTo(CategoryLetters::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}