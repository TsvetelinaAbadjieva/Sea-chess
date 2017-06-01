<?php require_once 'common/header.php'; ?>
<?php require_once 'fb_login.php';?>

<?php
$fb= isset($_GET['fb'])? htmlspecialchars(trim($_GET['fb']),3):'';
/*
$fb= isset($_GET['fb'])? htmlspecialchars(trim($_GET['fb']),3):'';

$username   = isset($_POST['username'])?htmlspecialchars(trim($_POST['username']),ENT_QUOTES):'';
$password   = isset($_POST['password'])?htmlspecialchars(trim($_POST['password']),ENT_QUOTES):'';
$confirmedPassword   = isset($_POST['confirmedPassword'])?htmlspecialchars(trim($_POST['confirmedPassword']),ENT_QUOTES):'';
$email      = isset($_POST['email'])?htmlspecialchars(trim($_POST['email']),ENT_QUOTES):'';

if(isset($_POST['submit'])) {
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
    if ($collection->checkExistingUser($user))
        $userExists = true;
    elseif($collection->insert($user)){
        $_SESSION['logged_in'] = 1;
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['flash'] = "{$_SESSION['username']}, You logged in succesfully!";

        $userExists = true;
        echo $_SESSION['flash'];
        redirect("game.php");
    }
  }
}
*/
?>

<div class="">
    <div class="row col-md-12 col-xs-12 col-sm-12 registration map">
        <div class="row"><div class="col-md-12 col-xs-12 col-sm-12 frame"></div></div>

        <form class="form-horizontal" action="" method="post" id="registration">
            <div class="row">
                <div class="col-md-12 col-sm-9 robot" id="registration" style="float:right; font-size:30px;">
                    <h1 style="font-size:55px;">Sea Chess</h1>
                    <img src="https://s-media-cache-ak0.pinimg.com/originals/d9/87/0f/d9870fdf82d63a1648f9c616119f22f6.jpg" alt="" style="width:600px; height:370px;">
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-sm-2 col-xs-1"></div>
                <div class="col-md-4 col-sm-8 col-xs-10" id="registration" style="font-family: Gabriola;">
                    <h3>Registration page</h3>
                </div>
                <div class="col-md-3 col-sm-2 col-xs-1"></div>
            </div>

            <div id="divEmail" class="form-group <?php //echo ($errors['email']!='')?'has-error':'has-success'; ?> has-feedback" <?php echo ($fb!=null && $fb==1)?'hidden':''; ?>>
                <label class="control-label col-sm-3" for="inputGroupSuccess2" style="color:dodgerblue">Email</label>
                <div class="col-sm-9 col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="email" name="email" id="email" value="<?php //echo $email ?>" class="form-control" <?php //echo (!empty($errors['email']))? 'id="inputError2" aria-describedby="inputError2Status"':'id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status"' ?>>
                    </div>
                    <?php //if(empty($errors['email'])) {?>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                    <span id="inputGroupSuccess2Status" class="sr-only">(success)</span>
                    <?php //} else { ?>
                        <div id="errorEmail" class="alert alert-danger" role="alert" style="margin-top:10px;" hidden>
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error: </span>
                            <?php //echo $errors['email']; ?>
                        </div>
                    <?php //} ?>

                </div>
            </div>

            <div id="divUsername" class="form-group <?php //echo ($errors['username']!='')?'has-error':'has-success'; ?> has-feedback">
                <label class="control-label col-sm-3" for="inputSuccess3" style="color:dodgerblue">Username</label>
                <div class="col-sm-9 col-md-6">
                    <input type="text"  name="username" id="username" value="<?php //echo $username; ?>" class="form-control" <?php //echo (!empty($errors['username']))? 'id="inputError2" aria-describedby="inputError2Status"':'id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status"'?>>
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
                <label class="control-label col-sm-3" for="inputSuccess3" style="color:dodgerblue">Password</label>
                <div class="col-sm-9 col-md-6">
                    <input type="password" name="password" id="password" value="<?php //echo $password; ?>" class="form-control" <?php //echo (!empty($errors['password']))? 'id="inputError2" aria-describedby="inputError2Status"':'id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status"' ?>>
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
                </div>
            </div>

            <div id="divConfirmedPassword" class="form-group <?php //echo ($errors['confirmedPassword']!='')?'has-error':'has-success'; ?> has-feedback">
                <label class="control-label col-sm-3" for="inputSuccess3" style="color:dodgerblue">Confirm Password</label>
                <div class="col-sm-9 col-md-6">
                    <input type="password" name="confirmedPassword" id="confirmedPassword" value="<?php //echo $confirmedPassword; ?>" class="form-control" <?php //echo (!empty($errors['confirmedPassword']))? 'id="inputError2" aria-describedby="inputError2Status"':'id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status"' ?>>

                    <?php //if(empty($errors['confirmedPassword'])) {?>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                    <span id="inputSuccess3Status" class="sr-only">(success)</span>
                    <?php //} else { ?>
                        <div id ="errorConfirmedPassword" class="alert alert-danger" role="alert" style="margin-top:10px;"hidden>
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error: </span>
                            <?php //echo $errors['confirmedPassword']; ?>
                        </div>
                    <?php //} ?>

                    <div id="userExists" class="alert alert-danger" role="alert" style="margin-top:10px;" <?php //echo !isset($userExists) || $userExists==false ?'hidden':''; ?> hidden>
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error: </span>

                    </div>


                </div>
            </div>

            <div style="width:600px; margin:0 auto">
                <div class="row">
                    <div class="col-md-4 col-sm-2 col-xs-2"></div>
                    <div class="col-md-4 col-sm-4  col-xs-8">
                       <p><button class="btn btn-login" type="submit" name="submit" id="submit" value="Login"><span>Register </span></button></p>
                        <div id="message"></div>
                    </div>
                    <div class="col-md-4 col-sm-2 col-xs-2"></div>
                </div>
            </div>
        </form>
        <div class="row"><div class="col-md-12 col-xs-12 col-sm-12 frame" style=""><p style="width:300px; margin:0 auto;font-size: 16px; margin-top:15px;">&copy; - 2017  Tsvetelina Abadjieva - Sea Chess</p></div></div>

    </div>

</div>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript" src="ajax/registrationValidate.js"></script>
