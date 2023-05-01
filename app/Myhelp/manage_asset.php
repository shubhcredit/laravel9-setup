<?php

// this function use the config/asset.php file for the configuration of the asset link and this call in header and footer
// which output is the perfect html for link the asset

function headerAsset($key=null){
    $config=config('asset');
        $_co=['common'];
        $inc=($key)?array_merge($_co,$key):$_co;
        foreach($inc as $inc_list){
            if(!empty($config[$inc_list]['head'])){
                foreach($config[$inc_list]['head'] as $file){
                    if(substr($file, -3)=='css'){
                        echo " <link rel='stylesheet' href='".asset($file)."'> ";
                    }else{
                        echo " <script src='".asset($file)."'></script> ";
                    }
                }
            }
        }
    }
    
    function footerAsset($key=null){
        $config=config('asset');
            $_co=['common'];
            $inc=($key)?array_merge($_co,$key):$_co;
            foreach($inc as $inc_list){
                if(!empty($config[$inc_list]['foot'])){
                    foreach($config[$inc_list]['foot'] as $file){
                        echo " <script src='".asset($file)."'></script> ";
                    }
                }
            }
        }