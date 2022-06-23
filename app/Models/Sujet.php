<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    use HasFactory;

  /*  public function sujets()
//{
    return $this->belongsToMany(sujets::class);
}*/
protected $fillable = ['titre','description','type_sujet_id','encadrant_id','raport','phone','email'];
public function etudiants()
{
    return $this->belongsToMany(Etudiant::class,'sujet_etudiants');
}
public function Type_sujet()
    {
        return $this->belongsTo(Type_sujet::class);
    }

    public function Encadrant(){
        return $this->belongsTo(User::class);
    }


    }


