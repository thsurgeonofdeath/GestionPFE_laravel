<?php

namespace App\Models;

use App\Http\Middleware\Etudiant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable = ['intitule'];
    public function Type_filiere()
    {
        return $this->belongsTo(Type_filiere::class);
    }
    public function Etudiant()
    {
        return $this->hasMany(Etudiant::class);
    }
    
    
}
