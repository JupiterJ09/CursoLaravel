<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    
    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'title',
        'content', 
        'category',
        'is_favorite'
    ];
    
    // Convertir campos a tipos específicos
    protected $casts = [
        'is_favorite' => 'boolean'
    ];
}