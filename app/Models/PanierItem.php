<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanierItem extends Model
{
    use HasFactory;



    public function article()
    {
        return $this->hasOne(Stockage::class,'ref','ref_article');
    }
}
