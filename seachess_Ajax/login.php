
<?php require_once 'common/header.php'; ?>
<?php require_once 'fb_login.php';?>


<?php
$username='';
$password='';
//$userExists=isset($_GET['userExists'])?htmlspecialchars(trim($_GET['userExists']), 3): true;

/*
$username   = isset($_POST['username'])?htmlspecialchars(trim($_POST['username']),ENT_QUOTES):'';
$password   = isset($_POST['password'])?htmlspecialchars(trim($_POST['password']),ENT_QUOTES):'';
if(isset($_POST['submit'])) {
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
                $userExists = true;
                redirect("game.php");
            }else $userExists=false;

        else  $userExists=false;
    }
}
*/
?>

<div class="row">
    <div class="col-md-12 col-xs-8 col-sm-10 registration map">
        <div class="row"><div class="col-md-12 col-xs-12 col-sm-12 frame"></div></div>
        <div class="">
            <form id="loginForm" class="form-horizontal" method="post" action="">
                <div class="row">
                    <div class="col-md-12 col-sm-12 robot" id="registration" style="float:right; font-size:30px;">
                        <h1 class="col-md-12 col-sm-12" style="font-size:55px;">Sea Chess</h1>
                        <div class="col-md-12 col-sm-12">
                            <img src="https://thumbs.dreamstime.com/x/abstract-d-background-chess-pawns-competition-success-idea-67583703.jpg" alt="" style="width:600px; height:370px;">
                        </div>
                        <div class="col-md-12 col-sm-6" id="registration"style="align:center;">
                            <h2>Login page</h2>
                        </div>
                    </div>
                </div>

                <div id="divUsername" class="form-group <?php //echo ($errors['username']!='')?'has-error':'has-success'; ?>has-feedback">
                    <label class="control-label col-sm-3 labels_login" for="" style="color:dodgerblue">Username</label>
                    <div class="col-sm-9 col-md-5">
                        <input type="text"  name="username" id="username" value="<?php //echo $username; ?>" class="form-control input" <?php// echo (!empty($errors['username']))? 'id="inputError2" aria-describedby="inputError2Status"':'id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status"'?>>
                        <?php //if(empty($errors['username'])) {?>
                            <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                            <span id="inputSuccess3Status" class="sr-only">(success)</span>
                        <?php //} else { ?>
                        <div id="errorUsername" class="alert alert-danger" role="alert" style="margin-top:10px;" hidden>
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error: </span>
                                <?php// echo $errors['username']; ?>
                            </div>
                        <?php //} ?>

                    </div>
                </div>

                <div id="divPassword" class="form-group <?php //echo ($errors['password']!='')?'has-error':'has-success'; ?> has-feedback">
                    <label class="control-label col-sm-3 labels_login" for="inputSuccess3" style="color:dodgerblue">Password</label>
                    <div class="col-sm-9 col-md-5">
                        <input type="password" name="password" id="password" value="<?php// echo $password; ?>" class="form-control input" <?php //echo (!empty($errors['password']))? 'id="inputError2" aria-describedby="inputError2Status"':'id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status"' ?>>
                        <?php //if(empty($errors['password'])) {?>
                            <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                            <span id="inputSuccess3Status" class="sr-only">(success)</span>
                        <?php //} else { ?>
                            <div id="errorPassword" class="alert alert-danger" role="alert" style="margin-top:10px;" hidden>
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error: </span>
                                <?php //echo $errors['password']; ?>
                            </div>
                        <?php //} ?>
                        <div id="divMessage" class="alert alert-danger" role="alert" style="margin-top:10px;" <?php //echo !isset($userExists) || $userExists==true ?'hidden':''; ?> hidden>
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error: </span>
                            <?php echo 'Wrong credentials'; ?>
                        </div>
                        <div id="error"></div>

                    </div>
                </div>

                <div style="width:600px; margin:0 auto">
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <div><button class="btn btn-login" type="submit"  id="submit" value="Login"><span>Login </span></button></div>
                            <div class=""></div>
                            <div class=""><p><a href="registration.php?fb=0" style="font-size: 16px">Registration</a></p></div>
                            <div class=""></div>
                            <div class="fb-login-button" data-width="250" data-max-rows="2" data-size="small" data-button-type="login_with" data-show-faces="true" data-auto-logout-link="true" data-use-continue-as="false">Facebook</div>
                            <div class=""></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">




                    </div>
                </div>

            </form>
        </div>
            <div class="row"><div class="col-md-12 col-xs-12 col-sm-12 frame" style=""><p style="width:300px; margin:0 auto;font-size: 16px; margin-top:15px;">&copy; - 2017  Tsvetelina Abadjieva - Sea Chess</p></div></div>
    </div>
</div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript" src="ajax/login.js"></script>






