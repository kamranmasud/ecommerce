<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function addUser($params){
//        dd($params);
        $params = (array) $params;
        dd($params);
        
    }
}
