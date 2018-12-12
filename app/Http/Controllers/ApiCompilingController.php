<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiCompilingController extends Controller
{
    //
    
    public function index(Request $req) {
//        dd($req->all());
        $finalarray = array();    
        $decodedRequest = json_decode($req->get('request'));
        
        if(empty($req->get('request'))){
//            dd('hjd');
            $finalarray['status'] =404; 
            $finalarray['message'] ="Request not found"; 
            $finalarray['result'] = []; 
        }
                
        if(!empty($decodedRequest)){
//            dd($decodedRequest);
//            dd('here');
            foreach($decodedRequest as $key => $data){
//                dd($data);
//                dd(empty($data->api_key));
                if(empty($data->api_key)){
                    $finalarray['status'] =404; 
                    $finalarray['message'] ="Api key not found"; 
                    $finalarray['result'] = [];
//                    dd($finalarray);
                }
                else
                if($data->api_key != env('API_KEY')){
                    $finalarray['status'] = 202; 
                    $finalarray['message'] ="Api key not correct/match"; 
                    $finalarray['result'] = []; 
//                    dd($finalarray);
                }
                
//                dd($data->model);
                $small_pattern = "/^[a-z]+$/";
                $camel_pattern = "/^[a-zA-Z]+$/";
                $viewModels = config('viewmodels');
                
//                dd(empty($viewModels[$data->model]));
                if(empty($data->model)){
                    $finalarray['status'] = 404; 
                    $finalarray['message'] ="Model not found"; 
                    $finalarray['result'] = []; 
//                    dd($finalarray);
                }
                else if(!preg_match($small_pattern,$data->model)){
                    $finalarray['status'] = 404; 
                    $finalarray['message'] ="Model is not in lowercase"; 
                    $finalarray['result'] = [];
//                    dd($finalarray);
                }
                /*
                 * php artisan make:model Models/User.php
                 * 
                 */
//                dd($viewModels[$data->model]);
//                $viewModels[$data->model];
                 else if(empty($viewModels[$data->model])){
                    $finalarray['status'] = 404; 
                    $finalarray['message'] ="Model not found"; 
                    $finalarray['result'] = [];
//                    dd($finalarray);
                }
                
                if(empty($data->action)){
                    $finalarray['status'] = 404; 
                    $finalarray['message'] ="Action not found"; 
                    $finalarray['result'] = [];
                }
                else if(!preg_match($camel_pattern,$data->action)){
                    $finalarray['status'] = 404; 
                    $finalarray['message'] ="Action is not in camelcase"; 
                    $finalarray['result'] = [];
//                    dd($finalarray);
                }
                
                $className = $viewModels[$data->model];
//                dd($className);
                $classObj = new $className;
//                dd($classObj);
//                dd(!method_exists($classObj, $data->action));
                if(!method_exists($classObj, $data->action)){
                    $final_array['status'] = 404;
                    $final_array['message'] = 'Your Action is not correct';
                    $final_array['result'] = [];
//                    dd($final_array);
                }else{
                    $actionName  = $data->action;
               }
//               dd($actionName);
//               dd(isset($data->parameters));
               if(!isset($data->parameters)){
                  $final_array['status'] = 404;
                    $final_array['message'] = 'Parameters not found';
                    $final_array['result'] = [];
               }
//               dd($data->parameters);
               $classObj->$actionName($data->parameters);
            }
            
        }
        
        dd($finalarray);
        
    }
    
}