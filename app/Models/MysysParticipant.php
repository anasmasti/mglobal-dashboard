<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MysysParticipant extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'prenom', 'phone', 'email', 'type', 'city', 'mysysformation_id'
    ];
    public function mysysformation()
    {
        return $this->hasOne('App\Models\MysysFormation','id','mysysformation_id');
    }
}
