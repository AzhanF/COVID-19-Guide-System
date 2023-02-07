<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'birthday',
        'nationality',
        'religion',
        'gender',
        'phone',
        'address',
        'photo',
        'qualification',
        'specialization',
        'membership',
    ];

    public function posts(){
        return $this->hasMany(Advice::class);
    }
}