<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationParticipant extends Model
{
    use HasFactory;
    protected $fillable = [
        'formarion_id', 'participant_id',
    ];
}
