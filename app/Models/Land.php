<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;
    
    public function festivals() {
        return $this->hasMany('App\Model\Festival');
    }
}
