<?php

function redirect($path){

    header("Location:$path");
    exit;
}

function errorExists($errors){
    $flag=false;
    foreach($errors as $key =>$value){
        if($value!='')
            $flag=true;
    }
    return $flag;
}

function showFlash(){
    $flash= isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1 && isset($_SESSION['flash'])? $_SESSION['flash']:'';
    if($flash!='')
        echo "<span class='flash'>{$_SESSION['flash']}</span> ";

}
function showMessage($message){
        echo "<span class='flash'>{$message}</span> ";

}


function checkLogin(){
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!=1)
        redirect('login.php');

}
function logout(){
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
        unset($_SESSION['logged_in']);
    }
    redirect('login.php');
}