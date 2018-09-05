<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewComposingController extends Controller
{
    //
    public function buildTemplate($pagename=""){
//        dd($pagename);
        
        $viewData = array();
        
        $pageCss = config('pages.'.$pagename.'.css');
        $pageJs = config('pages.'.$pagename.'.js');
        $globalCss = config('globalCss');
        $globalJs = config('globalJs');
        
        $pageSections = array('head', 'header', 'section', 'footer');
        
        foreach ($pageSections as $section) {
//            dd($section);
            $this->viewData[$section] = config('pages.'.$pagename.'.'.$section);
//            dd($this->viewData);
        }
//        dd($this->viewData);
        
        return view(config('pages.'.$pagename.'.layout'), $this->viewData);
        
    }
    
}
