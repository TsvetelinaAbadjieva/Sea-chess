<?php
require_once 'common/init.php';
//header("Content-type:application/html");
session_start();
$message='';


$resultCollection= new ResultCollection();

//if(isset($_POST['save'])){
$gameResult=isset($_POST['result'])?(int)htmlspecialchars(trim($_POST['result']),ENT_QUOTES):'';

if($gameResult>=0) {
    $entityResult = new ResultEntity($gameResult);
    $resultCollection = new ResultCollection();
    if ($resultCollection->insert($entityResult, $_SESSION['username']))
        echo $message = "Result is inserted into Database";//showMessage("Result is inserted into Database");
    else echo $message = "Result is NOT successfully inserted into Database";
//showMessage("Result is NOT succesfully inserted into Database");
}else echo $message = "Result is NOT successfully inserted into Database";
//}