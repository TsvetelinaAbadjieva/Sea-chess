<?php require_once "../common/init.php";
session_start();

$username   = isset($_POST['username'])?htmlspecialchars(trim($_POST['username']),ENT_QUOTES):'';
$password   = isset($_POST['password'])?htmlspecialchars(trim($_POST['password']),ENT_QUOTES):'';
//
if(isset($_POST['username']) && isset($_POST['password'])){
//if(isset($_POST['submit'])) {
    $user = new UserEntity($username, $password);
    $collection = new UserCollection();
            if($collection->checkUserCredentials($user)) {
                $_SESSION['logged_in'] = 1;
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['flash'] = "{$_SESSION['username']}, You logged in succesfully!";
               echo $userExists = true;
                //echo "Predi game.php";
                redirect("../game.php");
            }else {
               echo $userExists=false;
                // redirect("../forms/contact_form.php");
               // echo "Sled game.php";
                //echo "<span style='color:red;'>Sorry username already taken !!!</span>";
               //return false;
                //redirect('login.php?userExists='.$userExists);


            }



}

