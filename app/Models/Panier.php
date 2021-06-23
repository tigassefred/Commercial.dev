<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Panier extends Model
{
    use HasFactory;
    public $fillable=['ref','id_vendeurs','valeurs','remise','status','id_client'];



    public function Vendeur()
    {
        return $this->hasOne(User::class, 'id','id_vendeurs');
    }
    public function Client()
    {
        return $this->hasOne(Client::class, 'id','id_client');
    }
    public function Item()
    {
        return $this->hasMany(PanierItem::class, 'ref_vente','ref');
    }
   

}
