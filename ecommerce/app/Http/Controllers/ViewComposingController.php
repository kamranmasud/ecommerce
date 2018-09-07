<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewComposingController extends Controller
{
    //
    
    public $storeCss = array();
    public $storeJs = array();
    public function buildTemplate($pagename=""){
//        dd($pagename);
        
        $viewData = array();
        
        
        $pageCss = config('pages.'.$pagename.'.css');
        $pageJs = config('pages.'.$pagename.'.js');
        $globalCss = config('globalCss');
        $globalJs = config('globalJs');
//        dd($globalCss);
        $pageSections = array('head', 'header', 'section', 'footer');
        
        foreach ($pageSections as $section) {
//            dd($section);
            
            if(!empty(config('pages.'.$pagename.'.'.$section))){
                foreach (config('pages.'.$pagename.'.'.$section) as $key => $component) {
//                    dd(!empty(config('components.'.$component)));
                    if(!empty(config('components.'.$component))){
//                        dd('here');
                        $componentCss = config('components.'.$component.'.css');
                        $componentJs = config('components.'.$component.'.js');
//                        dd($componentCss);
//                        dd($componenJs);
                        $this->storeCss = array_merge($this->storeCss,$componentCss);
                        $this->storeJs = array_merge($this->storeJs,$componentJs);
                    }
                }
            }
//            dd($this->storeCss);
            
            $this->viewData[$section] = config('pages.'.$pagename.'.'.$section); 
//            dd($this->viewData);
        }
//        dd($this->viewData);
        $this->storeCss = array_merge($pageCss,$this->storeCss);
        $this->storeJs = array_merge($pageJs,$this->storeJs);
        
        $cssPath = array();
        foreach ($this->storeCss as $key => $value){
//            dd($value);
            $cssPath[$value] = $globalCss[$value];
//            dd($cssPath[$value]);
        }
//        dd($cssPath);
        $this->viewData['css'] = $cssPath;
        $jsPath = array();
        foreach ($this->storeJs as $key => $value){
//            dd($value);
            $jsPath[$value] = $globalJs[$value];
//            dd($jsPath[$value]);
        }
//        dd($jsPath);
        $this->viewData['js'] = $jsPath;
//        dd($this->viewData);
        
        return view(config('pages.'.$pagename.'.layout'), $this->viewData);
        
    }
    
}
