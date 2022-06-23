<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_filiere extends Model
{
    use HasFactory;
    protected $table = "type_filieres";

    protected $fillable = ['intitule'];
    public function Filiere()
    {
        return $this->hasMany(Filiere::class);
    }
    

}
