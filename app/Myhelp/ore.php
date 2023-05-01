<?php

//##-----------ore helper function-----

function orevlCreate($ore){
    $orevl_arr;
    foreach($ore as $ore_l){
        $orevl_arr[$ore_l['name']]=$ore_l['orevl'];
    }
    return $orevl_arr;
}


function orevlUpdate($ore,$id){
    $orevl_arr;
    foreach($ore as $ore_l){
        if(str_contains($ore_l['orevl'],'unique:')){
            $orevl_arr[$ore_l['name']]=$ore_l['orevl'].','.$id.',id';
        }else{
            $orevl_arr[$ore_l['name']]=$ore_l['orevl'];
        }
    }
    return $orevl_arr;
}

function oreRelationKey($str,$key){
    $_arr=explode(",",$str);
    return $_arr[$key];
}