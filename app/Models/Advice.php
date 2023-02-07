<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['consultant'];

    public function consultant(){
        return $this->belongsTo(Consultant::class, 'consultant_id');
    }
    
}
