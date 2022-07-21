<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model



{
    use HasFactory;

    protected $guarded = [];

    // Relationship to Company
    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }

    // Relationship to User
    public function user() {
        return $this->belongsTo(User::class);
    }

}
