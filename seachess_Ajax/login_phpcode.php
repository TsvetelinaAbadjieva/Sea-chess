
<?php
session_start();
require_once "common/init.php";

parse_str($_POST['data'],$data);

$username   = isset($data['username'])?htmlspecialchars(trim($data['username']),ENT_QUOTES):'';
$password   = isset($data['password'])?htmlspecialchars(trim($data['password']),ENT_QUOTES):'';
$userExists=0;
    $user = new UserEntity($username, $password);
    $errors = $user->validateLogin();
    $flag=false;
    foreach($errors as $key =>$value){
        if($value!='')
            $flag=true;
    }
    if(!$flag){
        $collection = new UserCollection();

        if ($collection->checkExistingUser($user))
            if($collection->checkUserCredentials($user)) {
                $_SESSION['logged_in'] = 1;
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['flash'] = "{$_SESSION['username']}, You logged in succesfully!";
               echo $userExists = 1;
                //redirect("game.php");
            }else echo $userExists=0;
                //redirect('login.php?userExists='.$userExists);



        else echo  $userExists=0;
            //redirect('login.php?userExists='.$userExists);


    } else echo $userExists;
//}



