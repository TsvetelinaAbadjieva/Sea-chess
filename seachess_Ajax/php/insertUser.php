<?php
require_once '../common/init.php';

//header('Content-type:application:json');
session_start();

parse_str($_POST['data'],$data);

$username   = isset($data['username'])?htmlspecialchars(trim($data['username']),ENT_QUOTES):'';
$password   = isset($data['password'])?htmlspecialchars(trim($data['password']),ENT_QUOTES):'';
$confirmedPassword   = isset($data['confirmedPassword'])?htmlspecialchars(trim($data['confirmedPassword']),ENT_QUOTES):'';
$email      = isset($data['email'])?htmlspecialchars(trim($data['email']),ENT_QUOTES):'';
//$result['result']=false;
$result=0;

    $user = new UserEntity($username, $password);
    $user->setConfirmedPassword($confirmedPassword);
    $user->setEmail($email);
    $errors = $user->validateRegistration();
    $flag=false;
    foreach($errors as $key =>$value){
        if($value!='')
            $flag=true;
    }
    $userExists=false;
    if(!$flag) {
        $collection = new UserCollection();
        if ($collection->checkExistingUser($user)|| $collection->checkExistingEmail($user)){
            $userExists = true;
            //$result=false;
            $result=0;
            echo $result; die;//json_encode($result);die;
        }

        elseif($collection->insert($user)){
            $_SESSION['logged_in'] = 1;
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['flash'] = "{$_SESSION['username']}, You logged in succesfully!";

            $userExists = true;
            //$result['result']=true;

            //echo 'true';
            $result=1;
            echo $result;
            //echo json_encode($result);
            //echo $_SESSION['flash'];
           // redirect("../game.php");

        }
    }else echo $result;//json_encode($result);
