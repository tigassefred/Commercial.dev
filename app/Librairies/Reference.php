<?php

namespace App\Librairies;

use App\Models\User;

trait Reference
{
    public static function Make_user_ref()
    {
        $a = 5;
        $ref = 000;
       do {
            $time = time() - 700000000;
            $ref = "user" . (string) $time;
            $response = User::where('ref', $ref)->exists(); 
           
            if(!$response) {$a = 100;}
        
        } while ($a <=10);

        return $ref;
    }




    public function Make_Product_ref()
    {
        $response = true;
        $ref = 000;
       do {
            $time = time() - 700000000;
            $ref = "P" . (string) $time;
           // $response = User::where('ref', $ref)->exists();
        } while (!$response);

        return $ref;
    }

    public function Make_Cart_ref()
    {
        $response = true;
        $ref = 000;
       do {
            $ref = \Illuminate\Support\Str::random('8');
           // $response = User::where('ref', $ref)->exists();
        } while (!$response);

        return $ref;
    }

    public static function Make_Order_ref()
    {
        $response = true;
        $ref = 000;
       do {
            $ref = time();
           // $response = User::where('ref', $ref)->exists();
        } while (!$response);

        return $ref;
    }
}
