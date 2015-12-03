<?php
require_once 'RedirectHelper.php';

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
        echo '<link rel="stylesheet" type="text/css" href="/SecretSanta/css/menu.css">';
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
        echo '<!DOCTYPE html>';
        $this->Open('html');
        $this->Open('head');
        $this->AddMeta();
        if($page){
            $this->AddJavaScript($page);
        }
        $this->close('head');
    }
    
    function Banner($bannerText, $user = "", $showLogout = true){
        $RH = new RedirectHelper();
        $this->Element("div", "row");
            if($showLogout){
                $this->Element('div', 'twelve columns');
                    $this->Element('div', 'menu-container u-pull-right');
                        $this->Element('div','drop');
                            //$this->Element('span', 'username');echo ucfirst($user); $this->Close('span');
                            $this->Element('button', 'c-hamburger c-hamburger--htra ');
                                $this->Element('span');echo "toggle menu"; $this->Close('span');
                            $this->Close('button');
                            $this->Element('ul');
                                $this->Element('li');
                                    $link = $RH->Redirect('christmasList');
                                    $this->Element('a','navLink',array('href'=> $link));
                                        $this->Element('span', 'fa fa-list fa-fw');$this->Close('span');echo " My List";
                                    $this->Close('a');
                                $this->Close('li');
                                $this->Element('li');
                                    $link2 = $RH->Redirect('secretPerson');
                                    $this->Element('a','navLink',array('href'=> $link2));
                                        $this->Element('span', 'fa fa-user fa-fw');$this->Close('span');echo " Secret Person";                                    
                                    $this->Close('a');
                                $this->Close('li');
                                $this->Element('li');
                                    $this->Element('a',null,array('href'=>'#', 'id'=>'logout'));
                                        $this->Element('span', 'fa fa-sign-out fa-fw');$this->Close('span');echo " Logout";
                                    $this->Close('a');
                                $this->Close('li');
                            $this->Close('ul');                    
                        $this->Close('div');
                    $this->Close('div');
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
        $this->Close('html');
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
    
    function ListItem($id, $text, $location, $showEdit){
        $html = '<div class="row list-item"><div class="twelve columns">';
        $html .= '<p>'.$text.'</p>';
        $html .= '<p>Location: '.$location.'</p>';
        if($showEdit){
            $html .= '<div class="row u-pull-right"><div class="twelve columns">';
            $html .= '<button data-itemID="'.$id.'">Edit</button>';
            $html .= '</div></div>';
        }        
        $html .= '</div></div>';
        echo $html;
    }
}

