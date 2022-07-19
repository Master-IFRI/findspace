<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;

    protected $fillable = [
        'nbre',
        'annee',
        'id_filiere'
    ];

    public function filiere()
    {
        return $this->belongsTo('App\Models\Filiere', 'id_filiere', 'id');
    }
}
