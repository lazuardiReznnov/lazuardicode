<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Unit extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['type', 'flag', 'group'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function bak()
    {
        return $this->belongsTo(Bak::class);
    }

    public function flag()
    {
        return $this->belongsTo(Flag::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function letter()
    {
        return $this->hasMany(letter::class);
    }

    public function fileUnit()
    {
        return $this->hasMany(FileUnit::class);
    }
}
