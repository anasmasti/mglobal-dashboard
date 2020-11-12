<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MysysFormation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','url_img','global_event','mysystheme_id','certif', 'description', 'programme','professeur', 'prerequisite', 'category' , 'duration','objectif', 'avantage', 'prix', 'prix_off',
    ];
    public function mysysparticipant()
    {
        return $this->belongsTo('App\Models\MysysParticipant');
    }
   
}
