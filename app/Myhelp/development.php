<?php
if(!function_exists('pr')){
    function pr($prd){
        echo"<pre>";
        print_r($prd);
        echo"</pre>";
    }
}
if (!function_exists('prx')){
    function prx($prd){
        echo"<pre>";
        print_r($prd);
        echo"</pre>";
        die();

    }
}
// for show the variable value with datatype 
if(!function_exists('vd')){
    function vd($prd){
        echo"<pre>";
        var_dump($prd);
        echo"</pre>";
    }
}

if (!function_exists('vdx')){
    function vdx($prd){
        echo"<pre>";
        var_dump($prd);
        echo"</pre>";
        die();

    }
}
 // this is used for get the array index which match the key(column)  value
if(!function_exists('getindex')){
function getindex($arr, $col,$val){
    $i=0;
    foreach($arr as $list){
        if($list->$col==$val){
            return $a=$i;
        }
        $i++;
    }
    return null;
}

}

//------------------------------FOR RETURN THE MESSAGE---------------------------------


function goCreated($status,$url){
    if($status){
        return redirect($url)->with('msg_success','Creation Successfull')->send();
    }else{
        return redirect($url)->with('msg_fail','Something went wrong, try again !!')->send();
    }
}
//##-------CALL AS-- goCreated($status,$url);  ---------------------

function goUpdated($status,$url){
    if($status){
        return redirect($url)->with('msg_success','Updation Successfull')->send();
    }else{
        return redirect($url)->with('msg_fail','Something went wrong, try again !!')->send();
    }
}
//##-------CALL AS-- goUpdated($status,$url);  ---------------------


function goDeleted($status,$url){
    if($status){
        return redirect($url)->with('msg_success','Deletion Successfull')->send();
    }else{
        return redirect($url)->with('msg_fail','Something went wrong, try again !!')->send();
    }
}
//##-------CALL AS-- goDeleted($status,$url);  ---------------------

function goException(){
    return redirect()->back()->with('msg_fail','Something went wrong, Exception occured !!')->send();
}
//##-------CALL AS-- goException();  ---------------------

function goRestored($status){
    if($status){
        return back()->with('msg_success','Restored Successfull')->send();
    }else{
        return back()->with('msg_fail','Something went wrong, try again !!')->send();
    }
}
//##-------CALL AS-- goRestored($status);  ---------------------

function goRestoredAll($status,$url){
    if($status){
        return redirect($url)->with('msg_success','All Restored Successfull')->send();
    }else{
        return redirect($url)->with('msg_fail','Something went wrong, try again !!')->send();
    }
}
//##-------CALL AS-- goAllRestored($status,$url);  ---------------------

function goForceDeleted($status){
    if($status){
        return back()->with('msg_success','Force Deletion Successfull')->send();
    }else{
        return back()->with('msg_fail','Something went wrong, try again !!')->send();
    }
}
//##-------CALL AS-- goForceDeleted($status);  ---------------------


