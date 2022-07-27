<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'site_ref',
        'site_location',
        'notes',
        'last_seen'
    ];
}
