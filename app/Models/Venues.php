<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venues extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'venue', 'venue_type', 'floor','body','slug'
    ];
}
