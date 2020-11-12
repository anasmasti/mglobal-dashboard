<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MysysTheme extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','mysysdomain_id', 'desc', 'url_img'
    ];
  
}
