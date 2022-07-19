<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    public function stats()
    {
        return $this->hasMany('App\Models\Stats', 'id_filiere', 'id');
    }
}
