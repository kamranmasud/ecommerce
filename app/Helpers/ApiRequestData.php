<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiRequestData
 *
 * @author Kamran Masud
 */
namespace App\Helpers;

class ApiRequestData {
    //put your code here
    public $model = '';
    public $action = '';
    public $parameters = '';
    public $api_key = '';
    
    public function __construct($model, $action, $parameters) {
        $this->model = $model;
        $this->action = $action;
        $this->parameters = $parameters;
        $this->api_key = env('API_KEY');
    }
}
