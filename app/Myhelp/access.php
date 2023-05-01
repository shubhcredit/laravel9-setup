<?php

//-----------------------------------------------FOR VALIDATE THE METHOD----------------------------
function canAccess($method_name){
    if(session('admin_logged_in')['role_is']['role_name']=='superadmin'){  //---- FOR SUPERADMIN SKIP THIS--
        return true;   //-----GO AHEAD---
    }else{   // -----CHECK PERMISSION----
        $permit=session('admin_logged_in')['role_is']['permit'];
        if (!in_array($method_name, json_decode($permit,true))){
            return redirect('admin/dashboard')->with('msg_fail','You have not permission to access')->send();
        }
    }
}
//##----------CALL AS -- canAccess(__METHOD__); -- 
function canAccessTF($method_name){
    if(session('admin_logged_in')['role_is']['role_name']=='superadmin'){  //---- FOR SUPERADMIN SKIP THIS--
        return true;   //-----GO AHEAD---
    }else{   // -----CHECK PERMISSION----
        $permit=session('admin_logged_in')['role_is']['permit'];
        if (in_array($method_name, json_decode($permit,true))){
            return true;
            // return redirect('admin/dashboard')->with('msg_fail','You have not permission to access')->send();
        }else{
            return false;
        }

    }
}
//##----------CALL AS -- canAccess(__METHOD__); -- 


//----------------------------------------FOR VALIDATE THE BUTTON AND LINK-----------------------------
function accessButton($method_name){
    if(session('admin_logged_in')['role_is']['role_name']=='superadmin'){  //---- FOR SUPERADMIN SKIP THIS--
        return true;   //-----GO AHEAD---
    }else{   // -----CHECK PERMISSION----
        $permit=session('admin_logged_in')['role_is']['permit'];
        if (in_array($method_name, json_decode($permit,true))){
            return true;
        }else{
            return false;
        }  
    } 
}
//##----CALL AS--- accessButton('App\Http\Controllers\DoctorController::index') ----return true or false ;---


//-------------------------------------FOR VALIDATE THE MENU WHICH HAVE SUB MENU-------------------------
function accessMenu($method_arr){
    if(session('admin_logged_in')['role_is']['role_name']=='superadmin'){  //---- FOR SUPERADMIN SKIP THIS--
        return true;   //-----GO AHEAD---
    }else{   // -----CHECK PERMISSION----
        $permit=session('admin_logged_in')['role_is']['permit'];
        $view=false;
        foreach($method_arr as $method_name){
            if(in_array($method_name, json_decode($permit,true))){
                $view=true;
            }  
        }
        return $view;
    }
}
//##----CALL AS--- accessMenu(['App\Http\Controllers\DoctorController::index','App\Http\Controllers\DoctorController::create']) ----return true or false ;---


