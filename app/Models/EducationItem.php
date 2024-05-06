<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'timespan',
        'institution'
    ];
}
