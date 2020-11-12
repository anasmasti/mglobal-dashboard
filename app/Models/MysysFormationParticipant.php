<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MysysFormationParticipant extends Model
{
    use HasFactory;
    protected $fillable = [
        'mysysformarion_id', 'mysysparticipant_id',
    ];
}
