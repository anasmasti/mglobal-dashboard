<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','url_img','global_event','theme_id', 'description','certif', 'programme','professeur', 'prerequisite', 'category' , 'duration','objectif', 'avantage', 'prix', 'prix_off',
    ];
 
}
