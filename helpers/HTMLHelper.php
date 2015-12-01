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
        echo '<link rel="stylesheet" type="text/css" href="/SecretSanta/css/styles.css">';
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
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
    
    function Banner($bannerText, $showLogout = true){
        $this->Element("div", "row");
            if($showLogout){
                $this->Element('div', 'twelve columns');
                    $this->Element('button', "u-pull-right", array('id'=>'logout'));
                        $this->Element('span', 'fa fa-sign-out fa-fw');$this->Close('span'); echo "Logout";
                    $this->Close('button');
                $this->Close('div');
            }
            $this->Element('div', 'twelve columns');
                $this->Element('h2'); echo $bannerText; $this->Close('h2');
            $this->Close('div');
        $this->Close('div');
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
    
    function Element($tag, $cssClass = null, $options = array(), $close = false){
        $element = '<'.$tag.' ';
        if(count($options) > 0){
            foreach($options as $attr => $value){
                $element .= $attr.'='.$value.' ';            
            }
        }
        if($cssClass !== null){
            $element .= 'class="'.$cssClass.'" ';
        }                
        if($close){
            $element .= ' />';
        }
        else{
            $element .= ' >';
        }
        echo $element;
    }
}
