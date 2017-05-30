<?php require_once "../common/init.php";
session_start();

$username   = isset($_POST['username'])?htmlspecialchars(trim($_POST['username']),ENT_QUOTES):'';
$email      =isset($_POST['email'])?htmlspecialchars(trim($_POST['email']),ENT_QUOTES):'';
$result='';
$resultEmail="This email already exists!";
$db=Database::getInstance();
if($username!=''){

    $username=$db->escapeStr($username);
    $sql="SELECT * FROM game.users WHERE users.username='{$username}'";
    $dbResult=$db->query($sql);
    if(mysqli_num_rows($dbResult)>0){
        $result='"'.$username.'" is NOT available username!';
        echo $result;die;

    }


}
if($email!=''){

    $email=$db->escapeStr($email);
    $sql="SELECT * FROM game.users WHERE users.email='{$email}'";
    $dbResult=$db->query($sql);
    if(mysqli_num_rows($dbResult)>0){
        $result='This email "'.$email.'" already exists!';
        echo $result;die;

    }

}
//header('Content-type:application/json');


