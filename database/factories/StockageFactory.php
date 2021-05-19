<?php

namespace Database\Factories;

use App\Models\Stockage;
use Illuminate\Support\Str;
use App\Librairies\Reference;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stockage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {      $dubay =  $this->faker->numberBetween(5000,150000);
           $Ref = Reference::Make_Product_ref();
        return [
              'name'=>$this->faker->text(25),
              'prix_achat'=>$dubay,
              'prix_vente'=>$dubay+2000,
              'nombre_paquet'=>$this->faker->numberBetween(1,24),
              'qte_magasin'=>$this->faker->numberBetween(0,100),
              'qte_boutique'=>$this->faker->numberBetween(3,10),
              'qte_seuil'=>$this->faker->numberBetween(1,3),
              'created_at'=>$this->faker->dateTime(),
              'updated_at'=>$this->faker->dateTime(),
              'ref'=>Str::random(8),
        ];
    }
}
