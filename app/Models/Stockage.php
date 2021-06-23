<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockage extends Model
{
   
    use HasFactory;
    
    protected $fillable = ['name','prix_vente','prix_achat','nombre_paquet','qte_magasin',
    'qte_boutique','qte_seuil','statut','ref'];


    public function getEnabledAttribute()
    {
      return  ($this->statut) ? true:false;
    }
}
