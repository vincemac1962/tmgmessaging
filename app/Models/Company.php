<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function slides() {
        return $this->hasMany(Slide::class, 'company_id');
    }

    public function users() {
        return $this->hasMany(User::class);
    }

}
