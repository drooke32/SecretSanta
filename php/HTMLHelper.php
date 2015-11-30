<?php

class HTMLHelper {
    
    function AddStyleSheet($cssPath){
        echo '<link rel="stylesheet" type="text/css" href="/SecretSanta/css/'.$cssPath.'.css">';
    }
    
    function AddJavaScript($jsPath){
        echo '<script src="/SecretSanta/js/'.$jsPath.'.js"></script>';
    }
    
    function AddDefaultCSS(){
        echo '<link rel="stylesheet" type="text/css" href="/SecretSanta/css/normalize.css">';
        echo '<link rel="stylesheet" type="text/css" href="/SecretSanta/css/skeleton.css">';
    }
    
    function AddMeta(){
        echo '<meta charset="utf-8">';
        echo '<title>Rooke Secret Santa</title>';
        echo '<meta name="description" content="Secret Santa Hub for the Rooke Famjam">';
        echo '<meta name="author" contect="D.Rooke">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
        echo '<script src="//code.jquery.com/jquery-2.1.4.js"></script>';
        $this->AddJavaScript('common');
        $this->AddDefaultCSS();
    }
    
    function DefaultHeader($page = null){
        echo '<head>';
        $this->AddMeta();
        if($page){
            $this->AddJavaScript($page);
        }
        echo '</head>';
    }
    
    function Open($tag){
        echo '<'.$tag.'>';
    }
    function Close($tag){
        echo '</'.$tag.'>';
    }
    
    function OpenBody(){
        $this->Open('body');
        $this->Element('div', 'container');
    }
    
    function CloseBody(){
        $this->Close('div');
        $this->Close('body');
    }
    
    function Element($tag, $cssClass = array(), $options = array(), $close = true){
        $element = '<'.$tag.' ';
        if(count($options) > 0){
            foreach($options as $attr => $value){
                $element .= $attr.'='.$value.' ';            
            }
        }
        $element .= 'class="'.$cssClass.'" ';        
        if($close){
            $element .= ' />';
        }
        else{
            $element .= ' >';
        }
        echo $element;
    }
}

