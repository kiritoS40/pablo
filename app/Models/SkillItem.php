<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'short_description'
    ];
}
