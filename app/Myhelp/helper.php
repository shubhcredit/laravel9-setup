<?php

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

// //---------------------------------DEVELOPMENT SUPPORT FUNCTION------------------------------
// if(!function_exists('pr')){
//     function pr($prd){
//         echo"<pre>";
//         print_r($prd);
//         echo"</pre>";
//     }
// }
// if (!function_exists('prx')){
//     function prx($prd){
//         echo"<pre>";
//         print_r($prd);
//         echo"</pre>";
//         die();

//     }
// }
// // for show the variable value with datatype 
// if(!function_exists('vd')){
//     function vd($prd){
//         echo"<pre>";
//         var_dump($prd);
//         echo"</pre>";
//     }
// }

// if (!function_exists('vdx')){
//     function vdx($prd){
//         echo"<pre>";
//         var_dump($prd);
//         echo"</pre>";
//         die();

//     }
// }
//  // this is used for get the array index which match the key(column)  value
// if (!function_exists('getindex')) {
//     function getindex($arr, $col, $val){
//         $i = 0;
//         foreach ($arr as $list) {
//             if ($list->$col == $val) {
//                 return $a = $i;
//             }
//             $i++;
//         }
//         return null;
//     }
// }

//--------------------FOR STORE EXCEPTION LOG-------------------------------------
function exceptionLog($e){
        $path = \Request::path();
        $method = \Request::method();
        $user = session('admin_logged_in')->id;
        $request=json_encode(\Request::all());
        $query=json_encode(DB::getQueryLog());
        $exceptionMessage = $e->getMessage();
        $save_ex = DB::table('exception_logs')->insert(['path'=>$path,'method'=>$method,'user'=>$user,'request'=>$request,'query'=>$query,'exception'=>$exceptionMessage]);
        // return true;
        goException();
}



//--------------------------------------FOR SLUG------------------------------------------------
 function toSlug($slug=null,$title=null){
    $slug=($slug)?strtolower(str_replace(" ","-",$slug)):strtolower(str_replace(" ","-",$title));
        return $slug;
 }


  // -----------------------------FOR IMAGE UPDATE-----------------------------------------
    function my_image_file_update($image,$folder,$table,$col_name,$id,$column,$old_image=null){
        // $fname = rand(00, 99) . '-' . $image->getClientOriginalName();
        // $fname= strToLower(str_replace(' ', '-', $fname));
        $fname = rand(11111111, 99999900) . '.' . $image->getClientOriginalExtension();
        $image->storeAs($folder.'/', $fname);
        $query=DB::table($table)->where($col_name,'=',$id)->update([$column=>$fname]);
            if($query AND Storage::exists($folder.'/'.$old_image)){
                Storage::delete($folder.'/'.$old_image);
            }
        return true;
    }
    // use as my_image_file_update($image_name,$folder, $model,$row_id,$column_name,$old_image=null);
    
    
    // -----------------------------FOR IMAGE -----------------------------------------
    function my_image_file_upload($image,$folder){
        // $fname = rand(00, 99) . '-' . $image->getClientOriginalName();
        // $fname= strToLower(str_replace(' ', '-', $fname));
        $fname = rand(11111111, 99999900) . '.' . $image->getClientOriginalExtension();
        $image->storeAs($folder.'/', $fname);
        return $fname;
    }
    // use as my_image_file_upload($image_name,$folder);

    // -----------------------------FOR IMAGE DELETE-----------------------------------------
    function my_image_file_delete($image,$folder){
        if(Storage::exists($folder.'/'.$image)){
            Storage::delete($folder.'/'.$image);
        }
        return true;
    }

    //------------------------FOR IMAGE UPLOAD AND DELETE----MEANS REPLACE--------------
    function my_image_file_replace($image,$folder,$old_image=null){
        // $fname = rand(00, 99) . '-' . $image->getClientOriginalName();
        // $fname= strToLower(str_replace(' ', '-', $fname));
        $fname = rand(11111111, 99999900) . '.' . $image->getClientOriginalExtension();
        $image->storeAs($folder.'/', $fname);

        if($fname && Storage::exists($folder.'/'.$old_image)){
            Storage::delete($folder.'/'.$old_image);
        }
        return $fname;
    }

//-------------------------------------------------DATE AND TIME---------------------
    function toDate($date=null){
        if($date!=null){
            // $date=date_format(date_create($date),"d-m-Y");
            $date=date("d-m-Y",strtotime($date));
            return $date;
        }
    }
    function toTime($date){
        if($date!=null){
            $date=date("h:ia",strtotime($date));
            return $date;
        }
    }
    function toDateTime($date=null){
        if($date!=null){
            $date=date("d-m-Y|h:ia",strtotime($date));
            return $date;
        }
    }
    function toSqlDate($_date){
        $_dt=explode('/',$_date);
        return $date=$_dt['2']."-".$_dt['1']."-".$_dt['0'];
    }
    function mdytoSql($_date){
        $_dt=explode('/',$_date);
        return $date=$_dt['2']."-".$_dt['0']."-".$_dt['1'];
    }
    function dateAs($date,$format="d-m-Y"){
        // $date=date_format(date_create($date),"d-m-Y");
        $date=date($format,strtotime($date));
        return $date;
    }

    function timeGap($d1,$d2=null){
        if($d2!=null){
            $date1=date_create($d1);
            $date2=date_create($d2);
            $diff=date_diff($date1,$date2);
            // $m= $diff->h*60;
            // return $diff->s;
        //    return $m+=$diff->i;
        return $diff->format("%H:%I:%S");
        }else{
            return "00:00:00";
        }
    }
    function toSecond($hms){
        $_arr=explode(':',$hms);
        $_sec="";
        $_sec= $_arr['0']*60*60;
        $_sec+=$_arr['1']*60;
        $_sec+=$_arr['2'];
        return $_sec;
    }

    function secToHms($iSeconds) {
        $seconds = $iSeconds % 60;
        $minutes = intval($iSeconds/60);
        $hours = intval($minutes/60);
        $minutes = $minutes % 60; 
        return date('H:i:s', mktime($hours, $minutes, $seconds));
    }

    function breakGap($_arr=null){
        if($_arr!=null){
            $_bt="0";
            foreach($_arr as $_arrlist){
                if(!in_array($_arrlist['reason'],['Training','Meeting'])){
                    $_bt+=toSecond(timeGap($_arrlist['on_at'],$_arrlist['off_at']));
                }
            }
            return $_bt;
        }else{
            return "00";
        }
    }
 
    function totalDay($from,$to=null){
        $_day=1;
        if($to!=null){
            $_from=date_create($from);
            $_to=date_create($to);
            $diff=date_diff($_from,$_to);
             $_day+=$diff->format("%r%a");
            echo $_day." Days";
        }else{
            echo $_day." Day";
        }
        
    }


    function leave_status($st){
        $_status="";
        switch($st){
            case 0:  $_status= "<span class='badge bg-warning'> Pending </span>"; break ;
            case 1:  $_status= "<span class='badge bg-success'> Approved </span>";break  ;
            case 2:  $_status= "<span class='badge bg-danger'> Cancelled </span>";break  ;
        }
        return $_status;

    }



//----------------------------UI COMPONENT-------------------------------

function uiSelect($name,$label,array $data,$val=null,$option=null,$selected=null,$col=6){
    $ui="";
    $ui.="<div class='form-group col-sm-$col'>";
    $ui.= "<label for='sel'> $label </label>";
    $ui.="<select name=$name class='form-control' id='sel'>";
    $ui .= "<option>Select</option>";
    if ($option == null && $val==null ) {
        foreach ($data as $list) {
            $active = ($selected!=null && $list == $selected) ? " selected " : " ";
            $ui .= "<option $active value=$list>".ucfirst($list)."</option>";
        }
    }else{
        foreach ($data as $list) {
            $active = ($selected!=null && $list[$val] == $selected) ? " selected " : " ";
            $ui .= "<option $active  value=$list[$val]>".ucfirst($list[$option])."</option>";
        }
    }
    $ui .= "</select>";
   echo $ui .= "</div>";

   
}
function uiInput($type,$name,$label,$value=null,$maxlength=null){
    $ui="";
    $ui.="<div class='form-group'>";
    $ui.="<label for=$name class='form-label'>$label</label>";
    $ui.="<input type=$type class='form-control' name=$name id=$name placeholder='Enter ' $name maxlength=$maxlength value=$value>";
    $ui.="</div>";
    echo $ui;
    // @error($name)
    // <span class="text-danger ">{{$message}}</span>
    // @enderror
}



//----------------FOR CONVERT snake_case TO Name Case--- string----
function snakeToName($string){
    return ucwords(str_replace('_'," ",$string));
}

//-----------------------------MULTI-DIMENSSION ARRAY TO INDEX ARRAY OF ANY COLUMN ------------
    function indexArrayOfCol($_col,$_arr=null){
        $_blank=[];
        if($_arr!=null){
            foreach($_arr as $_list){
                array_push($_blank,$_list[$_col]);
            }
        }
        return $_blank;
    }