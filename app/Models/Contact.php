<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'span',
        'email_icon',
        'email',
        'mobile_no_icon',
        'mobile_no',
        'button_text',
        'submit_link'
    ];
}
