<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ViewComposingControllers;

class HomeController extends ViewComposingController
{
    //
    public function homePage(){
        return $this->buildTemplate('home');
    }
}
