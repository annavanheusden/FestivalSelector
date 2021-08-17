<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;
    
    
    public function land() {
        return $this->belongsTo('App\Models\Land');
    }
    
    public function genres() {
        return $this->belongsToMany('App\Models\Genre',
                                    'geschikt_voor')
                    ->as('genre')
                    ->withPivot('score');
    }
}
