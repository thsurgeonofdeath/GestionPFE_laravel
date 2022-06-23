<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['promotion','cne','niveau'];
    public function Filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function sujets(){
        return $this->belongsToMany(Sujet::class,'sujet_etudiants');
    }
}

