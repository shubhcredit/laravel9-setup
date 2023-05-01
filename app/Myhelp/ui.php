<?php
// -----------------------------------------INPUT FIELD ----------------------------------
    function loadInputText($name,$label=null,$value=null,$col=6){
        $input_field="";
        $input_field.= "<div class='col-sm-$col'>";
        $label=ucfirst($label);
        $input_field.=($label!=null)?"<label for='$name-id' > $label </label>":"";
        $input_field.="<input type='text' class='form-control' name='$name' id='$name-id'
            placeholder='Enter $name' value='".old($name,$value)."'>";
            // @error('name');
            // $input_field.="<span class='text-danger'> $message </span>";
            // @enderror;
        $input_field.="</div>";
        echo $input_field;
    }


    
//-----------------------------------ACTIVE LINK--------------------------------
function activeLink($segments,$position){
    if(!in_array($_SERVER['REMOTE_ADDR'],['127.0..0.1','::1'])){
        $position=$position-1;
    }
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
   
    if(is_array($segments)){
        echo  $active = (in_array($uri_segments[$position],$segments)) ? "active" : "";
    }else{
        echo  $active = ($uri_segments[$position] == $segments) ? "active" : "";
    }
   
}

//-----------------------------------MENU OPEN LINK--------------------------------
function menuOpenLink($segments,$position){
    if(!in_array($_SERVER['REMOTE_ADDR'],['127.0..0.1','::1'])){
        $position=$position-1;
    }
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
 
    if(is_array($segments)){
        echo  $active = (in_array($uri_segments[$position],$segments)) ? "menu-open" : "";
    }else{
        echo  $active = ($uri_segments[$position] == $segments) ? "menu-open" : "";
    }
   
}
